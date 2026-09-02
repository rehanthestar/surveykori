<?php

$user      = require_login();
$survey_id = (int)($_GET['id'] ?? 0);
$survey    = get_own_survey($survey_id, $user['id']);

if (!$survey) {
    set_flash('error', 'Survey not found.');
    redirect('/survey/my-surveys.php');
}
if (!in_array($survey['status'], ['draft', 'rejected'])) {
    set_flash('error', 'This survey is already published.');
    redirect('/survey/my-surveys.php');
}

$points = get_points($user['id']);
$total  = (int)$survey['required_responses'] * (int)$survey['reward_per_response'];
$count  = question_count($survey_id);
$enough = (int)$points['available_points'] >= $total;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($count === 0) {
        set_flash('error', 'Add at least one question before publishing.');
        redirect('/survey/builder.php?id=' . $survey_id);
    }
    if (!$enough) {
        set_flash('error', 'You do not have enough points to publish this survey.');
        redirect('/survey/publish.php?id=' . $survey_id);
    }

    $pdo->beginTransaction();
    try {
        db_run(
            'UPDATE user_points
                SET available_points = available_points - ?,
                    locked_points    = locked_points + ?,
                    spent_points     = spent_points + ?
              WHERE user_id = ? AND available_points >= ?',
            [$total, $total, $total, $user['id'], $total]
        );
        db_run('UPDATE surveys SET total_points = ?, status = "pending" WHERE id = ? AND user_id = ?',
            [$total, $survey_id, $user['id']]);

        add_transaction($user['id'], $survey_id, 'SPEND', $total, 'Published survey "' . $survey['title'] . '"');
        add_transaction($user['id'], $survey_id, 'LOCK', $total, 'Points locked for "' . $survey['title'] . '"');
        notify($user['id'], 'Your survey "' . $survey['title'] . '" was sent to the admin for approval.');

        $pdo->commit();
    } catch (Exception $ex) {
        $pdo->rollBack();
        set_flash('error', 'Publishing failed. Please try again.');
        redirect('/survey/publish.php?id=' . $survey_id);
    }

    set_flash('success', 'Survey submitted. It becomes active after admin approval.');
    redirect('/survey/my-surveys.php');
}

$page_title = 'Publish Survey';
$active     = 'my-surveys';
