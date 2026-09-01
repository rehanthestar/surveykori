<?php
$user      = require_login();
$survey_id = (int)($_GET['id'] ?? 0);
$survey    = get_own_survey($survey_id, $user['id']);

if (!$survey) {
    set_flash('error', 'Survey not found.');
    redirect('/survey/my-surveys.php');
}

$editable = in_array($survey['status'], ['draft', 'rejected']);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $editable) {
    $questions = json_decode($_POST['questions_json'] ?? '[]', true);
    if (!is_array($questions)) {
        $questions = [];
    }

    db_run('DELETE FROM questions WHERE survey_id = ?', [$survey_id]);

    $order = 1;
    foreach ($questions as $q) {
        $text = trim($q['question_text'] ?? '');
        $type = $q['question_type'] ?? 'short_answer';
        if ($text === '' || !array_key_exists($type, question_types())) {
            continue;
        }
        db_run(
            'INSERT INTO questions (survey_id, question_text, question_type, is_required, question_order)
             VALUES (?, ?, ?, ?, ?)',
            [$survey_id, $text, $type, !empty($q['is_required']) ? 1 : 0, $order]
        );
        $question_id = $GLOBALS['pdo']->lastInsertId();

        if (in_array($type, ['multiple_choice', 'checkbox']) && !empty($q['options'])) {
            $opt_order = 1;
            foreach ($q['options'] as $option) {
                $option = trim($option);
                if ($option === '') { continue; }
                db_run('INSERT INTO question_options (question_id, option_text, option_order) VALUES (?, ?, ?)',
                    [$question_id, $option, $opt_order]);
                $opt_order++;
            }
        }
        $order++;
    }

    $action = $_POST['builder_action'] ?? 'draft';
    if ($action === 'preview') {
        redirect('/survey/preview.php?id=' . $survey_id);
    }
    if ($action === 'publish') {
        redirect('/survey/publish.php?id=' . $survey_id);
    }
    set_flash('success', 'Draft saved.');
    redirect('/survey/builder.php?id=' . $survey_id);
}

$rows = db_all('SELECT * FROM questions WHERE survey_id = ? ORDER BY question_order', [$survey_id]);
$existing = [];
foreach ($rows as $row) {
    $options = [];
    if (in_array($row['question_type'], ['multiple_choice', 'checkbox'])) {
        foreach (db_all('SELECT option_text FROM question_options WHERE question_id = ? ORDER BY option_order', [$row['id']]) as $opt) {
            $options[] = $opt['option_text'];
        }
    }
    $existing[] = [
        'question_text' => $row['question_text'],
        'question_type' => $row['question_type'],
        'is_required'   => (int)$row['is_required'],
        'options'       => $options,
    ];
}

$page_title = 'Survey Builder';
$active     = 'my-surveys';