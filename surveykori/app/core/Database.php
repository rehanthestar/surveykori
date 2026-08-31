<?php

    class Database
    {
        private PDO $connection;

        public function __construct(array $config)
        {
            try {
                $dsn = 'mysql:host=' . $config['host'] . ';dbname=' . $config['name'] . ';charset=utf8mb4';
                $this->connection = new PDO($dsn, $config['user'], $config['pass'], [
                    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    PDO::ATTR_EMULATE_PREPARES   => false,
                ]);
            } catch (PDOException $e) {
                die('Database connection failed. Please check includes/config.php.');
            }
        }

        public function run(string $sql, array $params = []): PDOStatement
        {
            $statement = $this->connection->prepare($sql);
            $statement->execute($params);
            return $statement;
        }

        public function one(string $sql, array $params = [])
        {
            return $this->run($sql, $params)->fetch();
        }

        public function all(string $sql, array $params = []): array
        {
            return $this->run($sql, $params)->fetchAll();
        }

        public function lastInsertId(): string
        {
            return $this->connection->lastInsertId();
        }

        public function beginTransaction(): bool
        {
            return $this->connection->beginTransaction();
        }

        public function commit(): bool
        {
            return $this->connection->commit();
        }

        public function rollBack(): bool
        {
            return $this->connection->rollBack();
        }
    }


?>