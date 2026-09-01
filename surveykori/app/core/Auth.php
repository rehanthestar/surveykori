<?php
    function is_logged_in()
    {
        return isset($_SESSION['user_id']);
    }

    function current_user()
    {
        if (!is_logged_in()) {
            return null;
        }
        return user_find($_SESSION['user_id']);
    }

    function require_login()
    {
        if (!is_logged_in()) {
            set_flash('error', 'Please log in to continue.');
            redirect('/login.php');
        }
        $user = current_user();
        if (!$user || $user['status'] !== 'active') {
            session_destroy();
            redirect('/login.php');
        }
        return $user;
    }

    function require_admin()
    {
        $user = require_login();
        if ($user['role'] !== 'admin') {
            set_flash('error', 'You are not admin get lost from the admin area');
            redirect('/dashboard.php');
        }
        return $user;
    }

?>