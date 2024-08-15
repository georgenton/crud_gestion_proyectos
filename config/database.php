<?php
// config/database.php

class Database {
    private $host = 'localhost';
    private $db_name = 'crud';
    private $username = 'crud_user';
    private $password = 'g3pklSWu!ZQ7';
    public $conn;

    public function getConnection() {
        $this->conn = null;

        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->exec("set names utf8");
        } catch (PDOException $exception) {
            echo "Connection error: " . $exception->getMessage();
        }

        return $this->conn;
    }
}