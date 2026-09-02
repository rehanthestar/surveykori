<?php

$user = require_login();
$type = $_GET['type'] ?? 'all';
$page = max(1, (int)($_GET['page'] ?? 1));
$per  = 15;
$off  = ($page - 1) * $per;

$where  = 'user_id = ?';
$params = [$user['id']];
if (in_array($type, ['EARN', 'SPEND', 'LOCK', 'REFUND'])) {
    $where   .= ' AND transaction_type = ?';
    $params[] = $type;
}

$total_row = db_one("SELECT COUNT(*) AS c FROM point_transactions WHERE $where", $params);
$total     = (int)$total_row['c'];
$pages     = max(1, (int)ceil($total / $per));

$transactions = db_all(
    "SELECT t.*, s.title FROM point_transactions t
       LEFT JOIN surveys s ON s.id = t.survey_id
      WHERE $where ORDER BY t.id DESC LIMIT $per OFFSET $off",
    $params
);

$page_title = 'Transaction History';
$active     = 'points';
