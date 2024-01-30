<?php

include("header.php");
include("inc/user.php");
include("inc/db_connection.php");
include("inc/flowers.php");

$dbConnection = DatabaseConnection::getInstance();
$conn = $dbConnection->getConnection();
$user = new User($conn);
$flower = new Flower();

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
    
    <h1 class="editP">Edit Profile</h1>
    <form method="post" class="forma" action="?action=update&user_id=<?= $userId ?>">
        <label for="new_username" class="labelat">New Username:</label>
        <input type="text" class="labelat" name="new_username" value="<?= $userToEdit["username"] ?>">
        <label for="new_email" class="labelat">New Email:</label>
        <input type="email" class="labelat" name="new_email" value="<?= $userToEdit["email"] ?>">
        <label for="new_password" class="labelat">New Password:</label>
        <input type="password" name="new_password" class="labelat">
        <input type="submit" name="update_user" value="Update Profile">
    </form>

    <h1 class="editP">Add Flower</h1>
    <form method="post" action="?action=add_flower&user_id=<?= $userId ?>">
        <label for="flower_name">Flower Name:</label>
        <input type="text" name="flower_name" required>
        <label for="price">Price:</label>
        <input type="number" name="price" step="0.01" required>
        <label for="category">Category:</label>
        <select name="category" required>
            <option value="best_seller">Best Seller</option>
            <option value="winter_collection">Winter Collection</option>
            <option value="plants_trees_collection">Plants & Trees Collection</option>
            <option value="dried_flowers_collection">Dried Flowers Collection</option>
        </select>
        <label for="image">Image URL:</label>
        <input type="file" name="image" id="fileToUpload" required>
        <input type="submit" name="add_flower" value="Add Flower">
    </form>
</div>

    <?php
    if (isset($_POST['add_flower'])) {
        $flowerName = $_POST['flower_name'];
        $price = $_POST['price'];
        $image = $_POST['image'];
        $category = $_POST['category'];

        if ($flower->addFlower($flowerName, $price, $image, $userId, $category)) {
            echo "Flower added successfully!";
        } else {
            echo "Error adding flower.";
        }
    }

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