<?php

class DatabaseConnection {
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "flowershop";
    private $conn;

    // Constructor to establish the database connection
    public function __construct() {
        $this->conn = new mysqli($this->host, $this->username, $this->password, $this->database);

        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    // Get the database connection
    public function getConnection() {
        return $this->conn;
    }

    // Close the database connection
    public function closeConnection() {
        $this->conn->close();
    }
}

?>
