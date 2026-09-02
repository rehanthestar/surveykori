<?php

if (is_logged_in()) {
    $u = current_user();
    if ($u && $u['role'] === 'admin') {
        redirect('/admin/index.php');
    }
}

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email    = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';

    if ($email === '' || $password === '') {
        $error = 'Please fill in both fields.';
    } else {
        $admin = db_one('SELECT * FROM users WHERE email = ? AND role = "admin"', [$email]);
        if (!$admin || !password_verify($password, $admin['password'])) {
            $error = 'Wrong admin email or password.';
        } elseif ($admin['status'] !== 'active') {
            $error = 'This admin account is blocked.';
        } else {
            $_SESSION['user_id'] = $admin['id'];
            redirect('/admin/index.php');
        }
    }
}

$page_title = 'Admin Login';
$hide_nav   = true;
