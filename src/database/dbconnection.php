<?php
require_once "../classes/credentials.php";
 
class Database {
    private $pdo;

    public function __construct() {
        $credentials = new Credentials();
        $dsn = "mysql:host=" . $credentials->get_db_address() . ";dbname=" . $credentials->get_db_name() . ";charset=utf8mb4";

        try {
            $this->pdo = new PDO($dsn, $credentials->get_db_username(), $credentials->get_db_password());
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo("Database connection failed: " . $e->getMessage());
        }
    }

    public function getConnection() {
        return $this->pdo;
    }
}
?>