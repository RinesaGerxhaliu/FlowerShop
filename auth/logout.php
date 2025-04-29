<?php
session_start();

include("auth/user.php");
include("auth/db_connection.php");
$dbConnection = DatabaseConnection::getInstance();
$conn = $dbConnection->getConnection();

$user = new User($conn);

$user->logout();

header("Location: Homepage.php");
exit();
?>