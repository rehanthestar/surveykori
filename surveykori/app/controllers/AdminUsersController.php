<?php

$admin = require_admin();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $target_id = (int)($_POST['user_id'] ?? 0);
    $action    = $_POST['action'] ?? '';
    $target    = db_one('SELECT * FROM users WHERE id = ? AND role = "user"', [$target_id]);

    if ($target) {
        if ($action === 'block') {
            db_run('UPDATE users SET status = "blocked" WHERE id = ?', [$target_id]);
            notify($target_id, 'Your account has been blocked by an administrator.');
            set_flash('success', 'User blocked.');
        } elseif ($action === 'unblock') {
            db_run('UPDATE users SET status = "active" WHERE id = ?', [$target_id]);
            notify($target_id, 'Your account has been unblocked.');
            set_flash('success', 'User unblocked.');
        } elseif ($action === 'bonus') {
            $bonus = (int)($_POST['bonus'] ?? 0);
            if ($bonus > 0 && $bonus <= 1000) {
                get_points($target_id);
                db_run('UPDATE user_points SET available_points = available_points + ?, earned_points = earned_points + ? WHERE user_id = ?',
                    [$bonus, $bonus, $target_id]);
                add_transaction($target_id, null, 'EARN', $bonus, 'Bonus points given by admin');
                notify($target_id, 'An administrator gave you ' . $bonus . ' bonus points.');
                set_flash('success', 'Bonus points added.');
            } else {
                set_flash('error', 'Bonus must be between 1 and 1000 points.');
            }
        }
    }
    redirect('/admin/users.php');
}

$search = trim($_GET['q'] ?? '');
$sql    = 'SELECT u.*, p.available_points, p.earned_points, p.spent_points
             FROM users u LEFT JOIN user_points p ON p.user_id = u.id
            WHERE u.role = "user"';
$params = [];
if ($search !== '') {
    $sql     .= ' AND (u.full_name LIKE ? OR u.email LIKE ? OR u.university LIKE ?)';
    $like     = '%' . $search . '%';
    $params   = [$like, $like, $like];
}
$sql   .= ' ORDER BY u.id DESC';
$users  = db_all($sql, $params);
$page_title = 'Manage Users';
$active     = 'admin-users';
$is_admin_area = true;
