<?php

function user_find($id)
{
    return db_one('SELECT * FROM users WHERE id = ?', [$id]);
}

function user_find_by_email($email)
{
    return db_one('SELECT * FROM users WHERE email = ?', [$email]);
}

function user_email_exists($email)
{
    return (bool)db_one('SELECT id FROM users WHERE email = ?', [$email]);
}


function user_create($data)
{
    db_run(
        'INSERT INTO users (full_name, email, password, university, department, user_type)
         VALUES (?, ?, ?, ?, ?, ?)',
        [$data['full_name'], $data['email'], $data['password'],
         $data['university'], $data['department'], $data['user_type']]
    );
    global $pdo;
    return (int)$pdo->lastInsertId();
}


function user_update_profile($id, $data)
{
    db_run(
        'UPDATE users SET full_name = ?, university = ?, department = ?, user_type = ? WHERE id = ?',
        [$data['full_name'], $data['university'], $data['department'], $data['user_type'], $id]
    );
}

function user_update_password($id, $hash)
{
    db_run('UPDATE users SET password = ? WHERE id = ?', [$hash, $id]);
}

function user_set_status($id, $status)
{
    db_run('UPDATE users SET status = ? WHERE id = ?', [$status, $id]);
}



?>