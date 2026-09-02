<?php

$user = require_login();
$survey_id = (int)($_GET['id'] ?? 0);
$survey = get_own_survey($survey_id, $user['id']);

if (!$survey) {
    set_flash('error', 'Survey not found.');
    redirect('/survey/my-surveys.php');
}
if (!in_array($survey['status'], ['draft', 'rejected'])) {
    set_flash('error', 'Only draft or rejected surveys can be edited.');
    redirect('/survey/my-surveys.php');
}

$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = trim($_POST['title'] ?? '');
    $desc = trim($_POST['description'] ?? '');
    $category = $_POST['category'] ?? '';
    $required = (int)($_POST['required_responses'] ?? 0);
    $reward = (int)($_POST['reward_per_response'] ?? 0);
    $deadline = $_POST['deadline'] ?? '';

    if ($title === '') { $errors[] = 'Title is required.'; }
    if ($desc === '') { $errors[] = 'Description is required.'; }
    if (!in_array($category, survey_categories())) { $errors[] = 'Choose a category.'; }
    if ($required < 1) { $errors[] = 'Required responses must be at least 1.'; }
    if ($reward < 1) { $errors[] = 'Reward must be at least 1 point.'; }
    if ($deadline === '') { $errors[] = 'Deadline is required.'; }

    if (!$errors) {
        db_run(
            'UPDATE surveys SET title = ?, description = ?, category = ?, required_responses = ?,
                    reward_per_response = ?, total_points = ?, deadline = ?
             WHERE id = ? AND user_id = ?',
            [$title, $desc, $category, $required, $reward, $required * $reward, $deadline, $survey_id, $user['id']]
        );
        set_flash('success', 'Survey information updated.');
        redirect('/survey/builder.php?id=' . $survey_id);
    }
    $survey = array_merge($survey, [
        'title' => $title, 'description' => $desc, 'category' => $category,
        'required_responses' => $required, 'reward_per_response' => $reward, 'deadline' => $deadline,
    ]);
}

$page_title = 'Edit Survey';
$active = 'my-surveys';
