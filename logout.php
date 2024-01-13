<?php
session_start(); // Ensure that the session is started

include("inc/user.php");
include("inc/db_connection.php");
$dbConnection = DatabaseConnection::getInstance();
$conn = $dbConnection->getConnection();
// Create a User instance
$user = new User($conn);

// Call the logout method from the User class
$user->logout();

// Redirect to the homepage or login page after logout
header("Location: Homepage.php");
exit();
?>
