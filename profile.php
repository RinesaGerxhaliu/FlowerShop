<?php

include("header.php");
include("inc/user.php");
include("inc/db_connection.php");

$dbConnection = DatabaseConnection::getInstance();
$conn = $dbConnection->getConnection();
$user = new User($conn);

if ($_SESSION['logged_in']) {

    $userId = $_SESSION['user_id'];

    if (isset($_GET['user_id'])) {
        $userId = $_GET['user_id'];
    }

    $userToEdit = $user->getUserById($userId);

    if (!$userToEdit) {
        echo "<p>User not found!</p>";
        exit;
    }

    ?>
    <h1>Edit Profile</h1>
    <form method="post" action="?action=update&user_id=<?= $userId ?>">
        <label for="new_username">New Username:</label>
        <input type="text" name="new_username" value="<?= $userToEdit["username"] ?>">
        <label for="new_email">New Email:</label>
        <input type="email" name="new_email" value="<?= $userToEdit["email"] ?>">
        <label for="new_password">New Password:</label>
        <input type="password" name="new_password">
        <input type="submit" name="update_user" value="Update Profile">
    </form>

    <?php

    if (isset($_POST['update_user'])) {
        $newUsername = $_POST['new_username'];
        $newEmail = $_POST['new_email'];
        $newPassword = $_POST['new_password'];

        $user->updateUser($userId, $newUsername, $newEmail, $newPassword);

        $_SESSION['username'] = $newUsername;

        header("Location: Homepage.php");
        exit;
    }
} else {
    echo "<p>You are not logged in.</p>";
}

include("footer.php");
?>