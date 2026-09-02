<?php

    $user = require_login();

    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (($_POST['action'] ?? '') === 'read_one') {
            db_run('UPDATE notifications SET is_read = 1 WHERE id = ? AND user_id = ?',
                [(int)$_POST['id'], $user['id']]);
        }
        if (($_POST['action'] ?? '') === 'read_all') {
            db_run('UPDATE notifications SET is_read = 1 WHERE user_id = ?', [$user['id']]);
        }
        redirect('/notifications.php');
    }


    $notifications = db_all('SELECT * FROM notifications WHERE user_id = ? ORDER BY id DESC', [$user['id']]);

    $page_title = 'Notifications';
    $active     = 'notifications';

?>