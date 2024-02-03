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
if (isset($_POST['update_flower'])) {
    $flowerId = $_POST['flower_id'];
    $flowerName = $_POST['editFlowerName'];
    $price = $_POST['editPrice'];
    $category = $_POST['editCategory'];
    $imageData = $_FILES['editImageFile']['name'];


    $flowers->updateFlower($flowerId, $flowerName, $price, $category, $imageData);
    header("Location: dashboard.php");
    exit();

}
if ($_SESSION['role'] === 'admin') {
    if (isset($_GET['action']) && isset($_GET['user_id'])) {
        $action = $_GET['action'];
        $userId = $_GET['user_id'];

        if ($action === 'edit') {
            $userToEdit = $user->getUserById($userId);
            ?>
            <h1 class="titulli">Edit User</h1>
            <form method="post" action="?action=update&user_id=<?= $userId ?>" class="forma-editi">
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
    echo '<div class="all-users">';
    foreach ($allUsers as $currentUser):
        ?>
        <div class="permbjtja-dashboard">
            <h1 class="emri">
                <?= $currentUser["username"] ?>
            </h1>
            <p class="permbajtja">
                <?= $currentUser["email"] ?>
            </p>
            <div class="user-delete">
            <a href="?action=edit&user_id=<?= $currentUser['id'] ?>" class="editi">Edit</a>
            <a href="?action=delete&user_id=<?= $currentUser['id'] ?>" class="delete">Delete</a>
            </div>
        </div>
        <hr class="hr" />
        <?php
    endforeach;
    echo'</div>';
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
                    <button onclick="openModal(
                                <?= $flower['flower_id'] ?>,
                                '<?= $flower['flower_name'] ?>',
                                <?= $flower['price'] ?>,
                                '<?= $flower['category'] ?>',
                                '<?= $flower['image'] ?>'
                            )" class="edit-button">Edit</button>
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
     echo '<div class="all-users">';
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
            <a href="?action=delete_contact&contact_id=<?= $contacts['id'] ?>" class="delete">Delete</a>
        </div>
        <hr class="hr" />
        <?php
    endforeach;
    echo'</div>';
}
include("footer.php");
?>
<div id="editFlowerModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal()"><i class="fa fa-close" style="font-size:24px;color:white"></i></span>
        <form id="editFlowerForm" action="?action=update_flower&flower_id=<?= $flower['flower_id'] ?>" method="post"
            enctype="multipart/form-data">
            <input type="hidden" name="flower_id" id="editFlowerId">
            <label for="editFlowerName">Flower Name:</label>
            <input type="text" name="editFlowerName" id="editFlowerName">
            <label for="editPrice">Price:</label>
            <input type="text" name="editPrice" id="editPrice">
            <label class="labelat" for="category">Category:</label>
            <select class="kategoria " id="editCategory" name="editCategory" required>
                <option value="best_seller">Best Seller</option>
                <option value="winter_collection">Winter Collection</option>
                <option value="plants_trees_collection">Plants & Trees Collection</option>
                <option value="dried_flowers_collection">Dried Flowers Collection</option>
            </select>

            <label class="labelat" for="editImage">Image:</label>
            <input class="labelat" type="file" name="editImageFile" id="fileToUpload">

            <input type="submit" name="update_flower" value="Update Flower">
        </form>
    </div>
</div>
<?php

?>
<script>
    function openModal(flowerId, flowerName, price, category, image) {
        document.getElementById('editFlowerId').value = flowerId;
        document.getElementById('editFlowerName').value = flowerName;
        document.getElementById('editPrice').value = price;
        document.getElementById('editCategory').value = category;

        document.getElementById('editFlowerModal').style.display = 'flex';
    }

    function closeModal() {
        document.getElementById('editFlowerModal').style.display = 'none';
    }

</script>