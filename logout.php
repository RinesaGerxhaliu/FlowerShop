<?php
session_start();

include("inc/user.php");
include("inc/db_connection.php");
$dbConnection = DatabaseConnection::getInstance();
$conn = $dbConnection->getConnection();

$user = new User($conn);

$user->logout();

header("Location: Homepage.php");
exit();
?>