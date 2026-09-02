<?php

$user      = require_login();
$survey_id = (int)($_GET['id'] ?? 0);

$survey = db_one(
    'SELECT s.*, u.full_name FROM surveys s JOIN users u ON u.id = s.user_id WHERE s.id = ?',
    [$survey_id]
);
if (!$survey) {
    set_flash('error', 'Survey not found.');
    redirect('/survey/find.php');
}

$already = db_one('SELECT id FROM responses WHERE survey_id = ? AND user_id = ?', [$survey_id, $user['id']]);
$is_mine = (int)$survey['user_id'] === (int)$user['id'];
$count   = question_count($survey_id);

$page_title = 'Survey Details';
$active     = 'find';