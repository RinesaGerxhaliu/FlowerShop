<?php

class User
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function register($username, $email, $password, $role = 'user')
    {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO users (username, email, password, role) VALUES ('$username', '$email', '$hashedPassword', '$role')";

        if ($this->db->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }

    public function login($username, $password)
    {
        $stmt = $this->db->prepare("SELECT id, password, email, role FROM users WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $hashedPassword = $row['password'];

            if (password_verify($password, $hashedPassword)) {
                session_start();
                $_SESSION['logged_in'] = true;
                $_SESSION['user_id'] = $row['id'];
                $_SESSION['username'] = $username;
                $_SESSION['role'] = $row['role'];
                return true;
            }
        }

        return false;
    }

    public function isUsernameTaken($username)
    {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->num_rows > 0;
    }

    public function logout()
    {
        $_SESSION = array();
        session_destroy();
    }

    public function getAllUsers()
    {
        $users = array();

        $result = $this->db->query("SELECT id, username, email FROM users");

        if ($result) {
            while ($row = $result->fetch_assoc()) {
                $users[] = $row;
            }

            $result->free();
        }

        return $users;
    }

    public function getUserById($userId)
    {
        $sql = "SELECT * FROM users WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("i", $userId);

        if ($stmt->execute()) {
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                $user = $result->fetch_assoc();
                return $user;
            } else {
                return null;
            }
        } else {
            return null;
        }
    }

    public function updateUser($userId, $username, $email, $password = null)
    {
        $sql = "UPDATE users SET username = '$username', email = '$email' WHERE id = $userId";
        $result = $this->db->query($sql);

        if ($password !== null) {
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $sqlPassword = "UPDATE users SET password = '$hashedPassword' WHERE id = $userId";
            $resultPassword = $this->db->query($sqlPassword);
        }

        return $result && (!$password || $resultPassword);
    }

    public function deleteUser($userId)
    {
        $sql = "DELETE FROM users WHERE id = $userId";
        return $this->db->query($sql);
    }
}
?>