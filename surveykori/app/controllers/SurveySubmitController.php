<?php

$user      = require_login();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    redirect('/survey/find.php');
}

$survey_id = (int)($_POST['survey_id'] ?? 0);
$answers   = $_POST['answer'] ?? [];

$survey = db_one('SELECT * FROM surveys WHERE id = ?', [$survey_id]);

if (!$survey || $survey['status'] !== 'active') {
    set_flash('error', 'This survey is not available.');
    redirect('/survey/find.php');
}

if ((int)$survey['user_id'] === (int)$user['id']) {
    set_flash('error', 'You cannot answer your own survey.');
    redirect('/survey/find.php');
}

if (db_one('SELECT id FROM responses WHERE survey_id = ? AND user_id = ?', [$survey_id, $user['id']])) {
    set_flash('error', 'You have already answered this survey.');
    redirect('/survey/find.php');
}

$questions = db_all('SELECT * FROM questions WHERE survey_id = ? ORDER BY question_order', [$survey_id]);

foreach ($questions as $q) {
    if (!$q['is_required']) {
        continue;
    }
    $value = $answers[$q['id']] ?? '';
    $empty = is_array($value) ? count($value) === 0 : trim((string)$value) === '';
    if ($empty) {
        set_flash('error', 'Please answer all required questions.');
        redirect('/survey/take.php?id=' . $survey_id);
    }
}

$reward = (int)$survey['reward_per_response'];

$pdo->beginTransaction();
try {
    db_run('INSERT INTO responses (survey_id, user_id, earned_points) VALUES (?, ?, ?)',
        [$survey_id, $user['id'], $reward]);
    $response_id = $pdo->lastInsertId();

    foreach ($questions as $q) {
        $value = $answers[$q['id']] ?? '';
        if (is_array($value)) {
            $value = implode(', ', $value);
        }
        db_run('INSERT INTO answers (response_id, question_id, answer_text) VALUES (?, ?, ?)',
            [$response_id, $q['id'], trim((string)$value)]);
    }

    get_points($user['id']);
    db_run('UPDATE user_points
               SET available_points = available_points + ?, earned_points = earned_points + ?
             WHERE user_id = ?',
        [$reward, $reward, $user['id']]);
    add_transaction($user['id'], $survey_id, 'EARN', $reward, 'Completed survey "' . $survey['title'] . '"');

    db_run('UPDATE user_points SET locked_points = GREATEST(locked_points - ?, 0) WHERE user_id = ?',
        [$reward, $survey['user_id']]);

    db_run('UPDATE surveys SET collected_responses = collected_responses + 1 WHERE id = ?', [$survey_id]);

    notify($survey['user_id'], 'Your survey "' . $survey['title'] . '" received a new response.');
    notify($user['id'], 'You earned ' . $reward . ' points from completing "' . $survey['title'] . '".');

    $pdo->commit();
} catch (Exception $ex) {
    $pdo->rollBack();
    set_flash('error', 'Could not save your response. Please try again.');
    redirect('/survey/take.php?id=' . $survey_id);
}

$fresh = db_one('SELECT * FROM surveys WHERE id = ?', [$survey_id]);
if ((int)$fresh['collected_responses'] >= (int)$fresh['required_responses']) {
    db_run('UPDATE surveys SET status = "completed" WHERE id = ?', [$survey_id]);
    notify($fresh['user_id'], 'Your survey "' . $fresh['title'] . '" has been completed.');
}

set_flash('success', 'Thank you! Your response was saved and you earned ' . $reward . ' points.');
redirect('/survey/find.php');