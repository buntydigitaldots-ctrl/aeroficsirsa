<?php
class Database {
    private static $instance = null;
    private $pdo;
    
    private function __construct() {
        $driver = getenv('DB_DRIVER') ?: 'mysql';
        
        if ($driver === 'pgsql') {
            $host = getenv('PGHOST') ?: 'localhost';
            $port = getenv('PGPORT') ?: '5432';
            $dbname = getenv('PGDATABASE') ?: 'arofic';
            $user = getenv('PGUSER') ?: 'root';
            $password = getenv('PGPASSWORD') ?: '';
            $dsn = "pgsql:host=$host;port=$port;dbname=$dbname";
        } else {
            $host = getenv('DB_HOST') ?: getenv('PGHOST') ?: 'localhost';
            $port = getenv('DB_PORT') ?: '3306';
            $dbname = getenv('DB_NAME') ?: getenv('PGDATABASE') ?: 'arofic';
            $user = getenv('DB_USER') ?: getenv('PGUSER') ?: 'root';
            $password = getenv('DB_PASSWORD') ?: getenv('PGPASSWORD') ?: '';
            $dsn = "mysql:host=$host;port=$port;dbname=$dbname;charset=utf8mb4";
        }
        
        try {
            $this->pdo = new PDO($dsn, $user, $password, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false
            ]);
        } catch (PDOException $e) {
            die("Database connection failed: " . $e->getMessage());
        }
    }
    
    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }
    
    public function getConnection() {
        return $this->pdo;
    }
    
    public function query($sql, $params = []) {
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($params);
        return $stmt;
    }
    
    public function fetch($sql, $params = []) {
        return $this->query($sql, $params)->fetch();
    }
    
    public function fetchAll($sql, $params = []) {
        return $this->query($sql, $params)->fetchAll();
    }
    
    public function insert($table, $data) {
        $columns = implode(', ', array_keys($data));
        $placeholders = implode(', ', array_fill(0, count($data), '?'));
        $sql = "INSERT INTO $table ($columns) VALUES ($placeholders)";
        $this->query($sql, array_values($data));
        return $this->pdo->lastInsertId();
    }
    
    public function update($table, $data, $where, $whereParams = []) {
        $set = implode(' = ?, ', array_keys($data)) . ' = ?';
        $sql = "UPDATE $table SET $set WHERE $where";
        $this->query($sql, array_merge(array_values($data), $whereParams));
    }
    
    public function delete($table, $where, $params = []) {
        $sql = "DELETE FROM $table WHERE $where";
        $this->query($sql, $params);
    }
    
    public function getDriver() {
        return $this->pdo->getAttribute(PDO::ATTR_DRIVER_NAME);
    }
}
