<?php
    require_once __DIR__ . '/Config.php';

    try {
        $dsn = 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8mb4';
        $pdo = new PDO($dsn, DB_USER, DB_PASS, [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ]);
    } catch (PDOException $e) {
        die('Database connection failed. Please check app/core/Config.php.');
    }

    function db_run($sql, $params = [])
    {
        global $pdo;
        $stmt = $pdo->prepare($sql);
        $stmt->execute($params);
        return $stmt;
    }

    function db_one($sql, $params = [])
    {
        return db_run($sql, $params)->fetch();
    }

    function db_all($sql, $params = [])
    {
        return db_run($sql, $params)->fetchAll();
    }

?>