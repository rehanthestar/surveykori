<?php

$user      = require_login();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && ($_POST['action'] ?? '') === 'close') {
    $survey_id = (int)$_POST['survey_id'];
    $survey    = get_own_survey($survey_id, $user['id']);
    if ($survey && $survey['status'] === 'active') {
        close_survey_and_refund($survey_id, 'closed');
        set_flash('success', 'Survey closed. Unused points were refunded.');
    }
    redirect('/survey/my-surveys.php');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && ($_POST['action'] ?? '') === 'delete') {
    $survey_id = (int)$_POST['survey_id'];
    $survey    = get_own_survey($survey_id, $user['id']);
    if ($survey && in_array($survey['status'], ['draft', 'rejected'])) {
        db_run('DELETE FROM surveys WHERE id = ? AND user_id = ?', [$survey_id, $user['id']]);
        set_flash('success', 'Survey deleted.');
    }
    redirect('/survey/my-surveys.php');
}

$surveys = db_all('SELECT * FROM surveys WHERE user_id = ? ORDER BY id DESC', [$user['id']]);
$page_title = 'My Surveys';
$active     = 'my-surveys';
