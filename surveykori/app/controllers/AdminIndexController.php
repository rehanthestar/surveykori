<?php

$admin = require_admin();

function count_of($sql, $params = [])
{
    $row = db_one($sql, $params);
    return (int)$row['c'];
}

$total_users     = count_of('SELECT COUNT(*) AS c FROM users WHERE role = "user"');
$total_surveys   = count_of('SELECT COUNT(*) AS c FROM surveys');
$pending_surveys = count_of('SELECT COUNT(*) AS c FROM surveys WHERE status = "pending"');
$active_surveys  = count_of('SELECT COUNT(*) AS c FROM surveys WHERE status = "active"');
$completed_surveys = count_of('SELECT COUNT(*) AS c FROM surveys WHERE status = "completed"');
$other_surveys   = count_of('SELECT COUNT(*) AS c FROM surveys WHERE status IN ("draft", "rejected", "closed")');
$total_responses = count_of('SELECT COUNT(*) AS c FROM responses');
$points_row      = db_one('SELECT COALESCE(SUM(points), 0) AS c FROM point_transactions WHERE transaction_type = "EARN"');
$points_earned   = (int)$points_row['c'];
$market_row      = db_one(
    'SELECT COALESCE(SUM(p.available_points + p.locked_points), 0) AS total,
            COALESCE(SUM(p.locked_points), 0) AS locked
       FROM user_points p
       JOIN users u ON u.id = p.user_id
      WHERE u.role = "user"'
);
$market_points   = (int)$market_row['total'];
$locked_points   = (int)$market_row['locked'];

$pending = db_all(
    'SELECT s.*, u.full_name FROM surveys s JOIN users u ON u.id = s.user_id
      WHERE s.status = "pending" ORDER BY s.id ASC LIMIT 5'
);
$recent_users = db_all('SELECT * FROM users WHERE role = "user" ORDER BY id DESC LIMIT 5');
$page_title = 'Admin Dashboard';
$active     = 'admin-home';
$is_admin_area = true;
