<?php
$user      = require_login();
$points    = get_points($user['id']);
$filter    = $_GET['filter'] ?? 'all';
$sql       = 'SELECT * FROM point_transactions WHERE user_id = ?';
$params    = [$user['id']];

if ($filter === 'earned') {
    $sql .= ' AND transaction_type = "EARN"';
} elseif ($filter === 'spent') {
    $sql .= ' AND transaction_type IN ("SPEND", "LOCK")';
} elseif ($filter === 'refund') {
    $sql .= ' AND transaction_type = "REFUND"';
}
$sql .= ' ORDER BY id DESC LIMIT 20';
$transactions = db_all($sql, $params);
$page_title = 'Point Center';
$active     = 'points';