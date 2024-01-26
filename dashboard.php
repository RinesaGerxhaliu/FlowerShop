<?php
include("header.php");
include("inc/contact_form.php");
include("inc/user.php");
$dbConnection = DatabaseConnection::getInstance();
$conn = $dbConnection->getConnection();

$user = new User($conn);
$contacts = new ContactForm();
$contact_entries = $contacts->getAllContacts();

if (isset($_GET['action']) && $_GET['action'] === 'delete_contact' && isset($_GET['contact_id'])) {
    $contactId = $_GET['contact_id'];
    $contacts->deleteContact($contactId);
}

if ($_SESSION['role'] === 'admin') {
    if (isset($_GET['action']) && isset($_GET['user_id'])) {
        $action = $_GET['action'];
        $userId = $_GET['user_id'];

        if ($action === 'edit') {
            $userToEdit = $user->getUserById($userId);

            echo '<h1 class="titulli">Edit User</h1>';
            echo '<form method="post" action="?action=update&user_id=' . $userId . '">';
            echo '<label for="new_username">New Username:</label>';
            echo '<input type="text" name="new_username" value="' . $userToEdit["username"] . '">';
            echo '<label for="new_email">New Email:</label>';
            echo '<input type="email" name="new_email" value="' . $userToEdit["email"] . '">';
            echo '<input type="submit" name="update_user" value="Update User">';
            echo '</form>';
        } elseif ($action === 'delete') {
            $user->deleteUser($userId);
        }
    }

    if (isset($_POST['update_user'])) {
        $newUsername = $_POST['new_username'];
        $newEmail = $_POST['new_email'];
        $user->updateUser($userId, $newUsername, $newEmail);
    }

    $allUsers = $user->getAllUsers();

    echo '<h1 class="titulli">User Dashboard</h1>';
    foreach ($allUsers as $user):
        ?>
        <div class="permbjtja-dashboard">
            <h1 class="emri">
                <?= $user["username"] ?>
            </h1>
            <p class="permbajtja">
                <?= $user["email"] ?>
            </p>
            <a href="?action=edit&user_id=<?= $user['id'] ?>">Edit</a>
            <a href="?action=delete&user_id=<?= $user['id'] ?>">Delete</a>
        </div>

        <hr class="hr" />
        <?php
    endforeach;
} else {
    echo "<p>You don't have permission to access this page.</p>";
}

echo '<h1 class="titulli">dashboard</h1>';
foreach ($contact_entries as $contacts):
    ?>
    <div class="permbjtja-dashboard">
        <h1 class="emri">
            <?= $contacts["name"] ?>
        </h1>
        <p class="permbajtja">
            <?= $contacts["email"] ?>
        </p>
        <p class="permbajtja">
            <?= $contacts["message"] ?>
        </p>
        <p class="permbajtja">
            <?= $contacts["submission_date"] ?>
        </p>
        <a href="?action=delete_contact&contact_id=<?= $contacts['id'] ?>">Delete</a>
    </div>

    <hr class="hr" />
    <?php
endforeach;

include("footer.php");
?>