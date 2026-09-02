<?php

$user      = require_login();
$survey_id = (int)($_GET['id'] ?? 0);
$survey    = get_own_survey($survey_id, $user['id']);

if (!$survey) {
    set_flash('error', 'Survey not found.');
    redirect('/survey/my-surveys.php');
}

$questions = db_all('SELECT * FROM questions WHERE survey_id = ? ORDER BY question_order', [$survey_id]);
$responses = db_all(
    'SELECT r.*, u.full_name FROM responses r JOIN users u ON u.id = r.user_id
      WHERE r.survey_id = ? ORDER BY r.id DESC',
    [$survey_id]
);

if (($_GET['export'] ?? '') === 'csv') {
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="survey_' . $survey_id . '_responses.csv"');
    $out = fopen('php://output', 'w');

    $head = ['Response ID', 'Respondent', 'Submitted At'];
    foreach ($questions as $q) { $head[] = $q['question_text']; }
    fputcsv($out, $head);

    foreach ($responses as $r) {
        $line = [$r['id'], $r['full_name'], $r['submitted_at']];
        foreach ($questions as $q) {
            $a = db_one('SELECT answer_text FROM answers WHERE response_id = ? AND question_id = ?', [$r['id'], $q['id']]);
            $line[] = $a ? $a['answer_text'] : '';
        }
        fputcsv($out, $line);
    }
    fclose($out);
    exit;
}

$total    = count($responses);
$required = (int)$survey['required_responses'];
$percent  = $required > 0 ? round(($total / $required) * 100) : 0;
$page_title = 'Survey Results';
$active     = 'my-surveys';
