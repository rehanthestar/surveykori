<?php
    if(is_logged_in()) {
        redirect('/dashboard.php');
    }

    $errors = [];
    $email = '';

    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        $email = trim($_POST['email'] ?? '');
        $password = $_POST['password'] ?? '';

        if($email === '' || $password === '') {
            $errors[] = 'Email and password are required.';
        } else {
            $user = db_one('SELECT * FROM users WHERE email = ?', [$email]);

            if(!$user || !password_verify($password, $user['password'])) {
                $errors[] = 'Wrong email or password.';
            } elseif($user['status'] !== 'active') {
                $errors[] = 'Your account is deactivated. Please contact the admin.';
            } else {
                // Login successful - save the user in the session.
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['role'] = $user['role'];

                if($user['role'] === 'admin') {
                    redirect('/admin/index.php');
                }
                redirect('/dashboard.php');
            }
        }
    }

?>