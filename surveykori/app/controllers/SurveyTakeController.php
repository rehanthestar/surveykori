<?php

$user      = require_login();
$survey_id = (int)($_GET['id'] ?? 0);
$survey = db_one('SELECT s.*, u.full_name FROM surveys s JOIN users u ON u.id = s.user_id WHERE s.id = ?', [$survey_id]);

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
if (!$questions) {
    set_flash('error', 'This survey has no questions.');
    redirect('/survey/find.php');
}

$page_title = 'Take Survey';
$active     = 'find';