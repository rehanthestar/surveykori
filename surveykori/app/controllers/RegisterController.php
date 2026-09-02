<?php

    if(is_logged_in()) {
        redirect('/dashboard.php');
    }

    $errors = [];
    $data = [
        'full_name'  => '',
        'email'      => '',
        'university' => '',
        'department' => '',
        'user_type'  => 'student',
    ];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        foreach ($data as $key => $value) {
            $data[$key] = trim($_POST[$key] ?? '');
        }
        $password = $_POST['password'] ?? '';
        $confirm  = $_POST['confirm_password'] ?? '';

        
        if ($data['full_name'] === '')  { $errors[] = 'Full name is required.'; }
        if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) { $errors[] = 'A valid email is required.'; }
        if ($data['university'] === '') { $errors[] = 'University is required.'; }
        if ($data['department'] === '') { $errors[] = 'Department is required.'; }
        if (!in_array($data['user_type'], ['student', 'researcher'])) { $errors[] = 'Choose a valid user type.'; }
        if (strlen($password) < 6)      { $errors[] = 'Password must be at least 6 characters.'; }
        if ($password !== $confirm)     { $errors[] = 'Password and confirm password do not match.'; }

        
        if (!$errors) {
            $exists = db_one('SELECT id FROM users WHERE email = ?', [$data['email']]);
            if ($exists) {
                $errors[] = 'This email is already registered.';
            }
        }

        if (!$errors) {
            $hash = password_hash($password, PASSWORD_DEFAULT);
            db_run(
                'INSERT INTO users (full_name, email, password, university, department, user_type, role, status)
                 VALUES (?, ?, ?, ?, ?, ?, "user", "active")',
                [$data['full_name'], $data['email'], $hash, $data['university'], $data['department'], $data['user_type']]
            );
            $new_id = $GLOBALS['pdo']->lastInsertId();

            
            db_run('INSERT INTO user_points (user_id, available_points, earned_points) VALUES (?, 50, 50)', [$new_id]);
            add_transaction($new_id, null, 'EARN', 50, 'Welcome bonus points');
            notify($new_id, 'Welcome to Survey Kori! You received 50 starting points.');

            set_flash('success', 'Registration successful. You can log in now.');
            redirect('/login.php');
        }
    }
?>