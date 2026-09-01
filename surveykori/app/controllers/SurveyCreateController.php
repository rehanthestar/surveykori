<?php

$user = require_login();
$errors = [];

$form = [
    'title' => '', 'description' => '', 'category' => 'Education',
    'required_responses' => 10, 'reward_per_response' => 5, 'deadline' => '',
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $form['title']               = trim($_POST['title'] ?? '');
    $form['description']         = trim($_POST['description'] ?? '');
    $form['category']            = $_POST['category'] ?? '';
    $form['required_responses']  = (int)($_POST['required_responses'] ?? 0);
    $form['reward_per_response'] = (int)($_POST['reward_per_response'] ?? 0);
    $form['deadline']            = $_POST['deadline'] ?? '';

    if ($form['title'] === '')       { $errors[] = 'Title is required.'; }
    if ($form['description'] === '') { $errors[] = 'Description is required.'; }
    if (!in_array($form['category'], survey_categories())) { $errors[] = 'Choose a category.'; }
    if ($form['required_responses'] < 1)  { $errors[] = 'Required responses must be at least 1.'; }
    if ($form['reward_per_response'] < 1) { $errors[] = 'Reward per response must be at least 1 point.'; }
    if ($form['deadline'] === '' || strtotime($form['deadline']) < strtotime('today')) {
        $errors[] = 'Deadline must be today or a future date.';
    }

    if (!$errors) {
        $total = $form['required_responses'] * $form['reward_per_response'];
        db_run(
            'INSERT INTO surveys
                (user_id, title, description, category, required_responses,
                 reward_per_response, total_points, deadline, status)
             VALUES (?, ?, ?, ?, ?, ?, ?, ?, "draft")',
            [$user['id'], $form['title'], $form['description'], $form['category'],
             $form['required_responses'], $form['reward_per_response'], $total, $form['deadline']]
        );
        $survey_id = $GLOBALS['pdo']->lastInsertId();
        set_flash('success', 'Draft created. Now add your questions.');
        redirect('/survey/builder.php?id=' . $survey_id);
    }
}

$page_title = 'Create Survey';
$active     = 'create';