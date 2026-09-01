<?php

    function notify($user_id, $message)
    {
        db_run('INSERT INTO notifications (user_id, message) VALUES (?, ?)', [$user_id, $message]);
    }

    function unread_notifications($user_id)
    {
        $row = db_one('SELECT COUNT(*) AS c FROM notifications WHERE user_id = ? AND is_read = 0', [$user_id]);
        return (int)$row['c'];
    }

    function user_notifications($user_id, $limit = 50)
    {
        return db_all(
            'SELECT * FROM notifications WHERE user_id = ? ORDER BY id DESC LIMIT ' . (int)$limit,
            [$user_id]
        );
    }

    function mark_notifications_read($user_id)
    {
        db_run('UPDATE notifications SET is_read = 1 WHERE user_id = ?', [$user_id]);
    }
?>