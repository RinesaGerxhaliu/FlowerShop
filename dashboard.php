<?php
include("header.php");
include("inc/contact_form.php");
include("inc/user.php");
include("inc/flowers.php");

$dbConnection = DatabaseConnection::getInstance();
$conn = $dbConnection->getConnection();

$user = new User($conn);
$contacts = new ContactForm();
$flowers = new Flower();
$contact_entries = $contacts->getAllContacts();
$userId = $_SESSION['user_id'];
$user_flowers = $flowers->getFlowersByUserId($userId);

if (isset($_GET['action']) && $_GET['action'] === 'delete_contact' && isset($_GET['contact_id'])) {
    $contactId = $_GET['contact_id'];
    $contacts->deleteContact($contactId);
}

if (isset($_GET['action']) && $_GET['action'] === 'delete_flower' && isset($_GET['flower_id'])) {
    $flowerId = $_GET['flower_id'];
    $flowers->deleteFlower($flowerId);
}

if ($_SESSION['role'] === 'admin') {
    if (isset($_GET['action']) && isset($_GET['user_id'])) {
        $action = $_GET['action'];
        $userId = $_GET['user_id'];

        if ($action === 'edit') {
            $userToEdit = $user->getUserById($userId);
            ?>
            <h1 class="titulli">Edit User</h1>
            <form method="post" action="?action=update&user_id=<?= $userId ?>">
                <label for="new_username">New Username:</label>
                <input type="text" name="new_username" value="<?= $userToEdit["username"] ?>">
                <label for="new_email">New Email:</label>
                <input type="email" name="new_email" value="<?= $userToEdit["email"] ?>">
                <input type="submit" name="update_user" value="Update User">
            </form>
            <?php
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
    foreach ($allUsers as $currentUser): 
        ?>
        <div class="permbjtja-dashboard">
            <h1 class="emri">
                <?= $currentUser["username"] ?>
            </h1>
            <p class="permbajtja">
                <?= $currentUser["email"] ?>
            </p>
            <a href="?action=edit&user_id=<?= $currentUser['id'] ?>">Edit</a>
            <a href="?action=delete&user_id=<?= $currentUser['id'] ?>">Delete</a>
        </div>
        <hr class="hr" />
        <?php
    endforeach;
}
?>

<h1 class="titulli">My flowers</h1>
<div class="flowers">
    <?php if (!empty($user_flowers)): ?>
        <?php foreach ($user_flowers as $flower): ?>
            <div class="imageshop">
                <img class="imageshop-img" src="./images/<?= $flower['image'] ?>" alt="bestsell1">
                <div class="underimg">
                    <p>
                        <?= $flower['flower_name'] ?>
                    </p>
                    <p id="cmimi">$
                        <?= $flower['price'] ?>
                    </p>
                </div>

                <div class="butonat">
                <a href="?action=delete_flower&flower_id=<?= $flower['flower_id'] ?>" class="delete-button"
                    style="color: red; margin-right: 10px">Delete</a>
                <a href="#" class="edit-button">Edit</a>
                <a href="SingleFlower.php?flower_id=<?= $flower['flower_id'] ?>" class="view-button">View</a>
                </div>
                <p>Added on:
                    <?= $flower['added_date'] ?>
                </p>
                <p>Added by:
                    <?= $user->getUserById($flower['addedbyuser'])['username'] ?>
                </p>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>No flowers added. <a href="profile.php">Add one</a>.</p>
    <?php endif; ?>
</div>

<?php
if ($_SESSION['role'] === 'admin') {
    ?>
    <h1 class="titulli">Contacts</h1>
    <?php
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
}
include("footer.php");
?>