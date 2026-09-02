<?php

$user      = require_login();
$survey_id = (int)($_GET['id'] ?? 0);
$is_admin_preview = $user['role'] === 'admin';
$survey    = $is_admin_preview
    ? survey_find($survey_id)
    : get_own_survey($survey_id, $user['id']);

if (!$survey) {
    set_flash('error', 'Survey not found.');
    redirect($is_admin_preview ? '/admin/surveys.php' : '/survey/my-surveys.php');
}

$questions = db_all('SELECT * FROM questions WHERE survey_id = ? ORDER BY question_order', [$survey_id]);

$page_title = 'Preview Survey';
$active     = $is_admin_preview ? 'admin-surveys' : 'my-surveys';
$is_admin_area = $is_admin_preview;
