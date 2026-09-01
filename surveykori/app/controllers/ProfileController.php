<?php


    $user = require_login();
    $errors = [];

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && ($_POST['action'] ?? '') === 'update_profile') {
        $full_name  = trim($_POST['full_name'] ?? '');
        $university = trim($_POST['university'] ?? '');
        $department = trim($_POST['department'] ?? '');
        $user_type  = $_POST['user_type'] ?? 'student';

        if ($full_name === '')  { $errors[] = 'Full name is required.'; }
        if ($university === '') { $errors[] = 'University is required.'; }
        if ($department === '') { $errors[] = 'Department is required.'; }
        if (!in_array($user_type, ['student', 'researcher'])) { $errors[] = 'Invalid user type.'; }

        if (!$errors) {
            db_run(
                'UPDATE users SET full_name = ?, university = ?, department = ?, user_type = ? WHERE id = ?',
                [$full_name, $university, $department, $user_type, $user['id']]
            );
            set_flash('success', 'Profile updated.');
            redirect('/profile.php');
        }
    }


    if ($_SERVER['REQUEST_METHOD'] === 'POST' && ($_POST['action'] ?? '') === 'change_password') {
        $old     = $_POST['old_password'] ?? '';
        $new     = $_POST['new_password'] ?? '';
        $confirm = $_POST['confirm_password'] ?? '';

        if (!password_verify($old, $user['password'])) { $errors[] = 'Current password is wrong.'; }
        if (strlen($new) < 6)  { $errors[] = 'New password must be at least 6 characters.'; }
        if ($new !== $confirm) { $errors[] = 'New passwords do not match.'; }

        if (!$errors) {
            db_run('UPDATE users SET password = ? WHERE id = ?',
                [password_hash($new, PASSWORD_DEFAULT), $user['id']]);
            set_flash('success', 'Password changed.');
            redirect('/profile.php');
        }
    }

    $page_title = 'Profile';
    $active     = 'profile';

?>