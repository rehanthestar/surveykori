<?php

$user      = require_login();
$search    = trim($_GET['search'] ?? '');
$category  = $_GET['category'] ?? '';
$sort      = $_GET['sort'] ?? 'newest';

$sql = 'SELECT s.*, u.full_name,
               (SELECT COUNT(*) FROM questions q WHERE q.survey_id = s.id) AS q_count
          FROM surveys s
          JOIN users u ON u.id = s.user_id
         WHERE s.status = "active"
           AND s.user_id <> ?
           AND s.deadline >= CURDATE()
           AND s.collected_responses < s.required_responses
           AND s.id NOT IN (SELECT survey_id FROM responses WHERE user_id = ?)';
$params = [$user['id'], $user['id']];

if ($search !== '') {
    $sql .= ' AND (s.title LIKE ? OR s.description LIKE ?)';
    $params[] = '%' . $search . '%';
    $params[] = '%' . $search . '%';
}
if ($category !== '' && in_array($category, survey_categories())) {
    $sql .= ' AND s.category = ?';
    $params[] = $category;
}

if ($sort === 'reward') {
    $sql .= ' ORDER BY s.reward_per_response DESC';
} else {
    $sql .= ' ORDER BY s.id DESC';
}

$surveys = db_all($sql, $params);
$page_title = 'Find Surveys';
$active     = 'find';
