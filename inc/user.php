<?php

class User {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function register($username, $email, $password) {
        // Hash the password
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Insert user data into the database
        $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$hashedPassword')";

        if ($this->db->query($sql) === TRUE) {
            return true; // Registration successful
        } else {
            return false; // Registration failed
        }
    }

    public function login($username, $password) {
        // Retrieve the hashed password from the database based on the provided username
        $stmt = $this->db->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $hashedPassword = $row['password'];

            // Use password_verify to check if the entered password matches the hashed password
            return password_verify($password, $hashedPassword);
        }

        return false;
    }

    public function isUsernameTaken($username) {
        // Check if the username is already taken in the database
        $stmt = $this->db->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->num_rows > 0;
    }
}
?>
