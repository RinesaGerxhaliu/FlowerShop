<?php

class DatabaseConnection
{
    private static $instance = null;
    private $conn;

    private function __construct()
    {
        $this->host = "localhost";
        $this->username = "root";
        $this->password = "";
        $this->database = "flowershop";

        $this->conn = new mysqli($this->host, $this->username, $this->password, $this->database);

        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function getConnection()
    {
        return $this->conn;
    }

    public function closeConnection()
    {
        $this->conn->close();
    }

    public function query($sql)
    {
        return $this->conn->query($sql);
    }
}


?>