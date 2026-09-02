<?php
    $user = require_login();
    $points = get_points($user['id']);

    $created = db_one('SELECT COUNT(*) AS c FROM surveys WHERE user_id = ?', [$user['id']])['c'];
    $completed = db_one('SELECT COUNT(*) AS c FROM responses WHERE user_id = ?', [$user['id']])['c'];
    $received = db_one(
        'SELECT COUNT(*) AS c FROM responses r JOIN surveys s ON s.id = r.survey_id WHERE s.user_id = ?',
        [$user['id']]
    )['c'];


    $recent_surveys = db_all('SELECT * FROM surveys WHERE user_id = ? ORDER BY id DESC LIMIT 5', [$user['id']]);    
    $recent_transection = db_all('SELECT * FROM point_transactions WHERE user_id = ? ORDER BY id DESC LIMIT 5', [$user['id']]);
    $recent_notifications = db_all('SELECT * FROM notifications WHERE user_id = ? ORDER BY id DESC LIMIT 5', [$user['id']]);

    $page_title = 'Dashboard';
    $active = 'dashboard';

?>