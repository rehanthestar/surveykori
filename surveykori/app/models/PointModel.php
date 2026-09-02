<?php

function get_points($user_id)
{
    $p = db_one('SELECT * FROM user_points WHERE user_id = ?', [$user_id]);
    if (!$p) {
        db_run('INSERT INTO user_points (user_id) VALUES (?)', [$user_id]);
        $p = db_one('SELECT * FROM user_points WHERE user_id = ?', [$user_id]);
    }
    return $p;
}

function add_transaction($user_id, $survey_id, $type, $points, $description)
{
    db_run(
        'INSERT INTO point_transactions (user_id, survey_id, transaction_type, points, description)
         VALUES (?, ?, ?, ?, ?)',
        [$user_id, $survey_id, $type, $points, $description]
    );
}

function point_transactions($user_id, $limit = 10)
{
    return db_all(
        'SELECT * FROM point_transactions WHERE user_id = ? ORDER BY id DESC LIMIT ' . (int)$limit,
        [$user_id]
    );
}
