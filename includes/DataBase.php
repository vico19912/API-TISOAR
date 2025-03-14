<?php
namespace DB;
use PDO;
use PDOException;
use Dotenv\Dotenv;

class Database {
    private $pdo;
    public function __construct() {
        $dotenv = Dotenv::createImmutable(__DIR__ . '../../');
        //debuguear($dotenv);

        $dotenv->load();

        $host = $_ENV['DB_HOST'];
        $dbname = $_ENV['DB_NAME'];
        $username = $_ENV['DB_USER'];
        $password = $_ENV['DB_PASS'];
        $port = $_ENV['DB_PORT'];
        $charset = "utf8";

        $dsn = "mysql:host={$host};port={$port};dbname={$dbname};charset={$charset}";
        try {
            $this->pdo = new PDO($dsn, $username, $password, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false
            ]);
        } catch (PDOException $e) {
            die("Error de conexión: " . $e->getMessage());
        }
    }
    public function getConnection() {
        return $this->pdo;
    }

    public function closeConnection() {
        $this->pdo = null;
    }
}
