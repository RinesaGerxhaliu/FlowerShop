<?php
include("header.php");
include("inc/flowers.php");
include("inc/db_connection.php");

$dbConnection = DatabaseConnection::getInstance();
$conn = $dbConnection->getConnection();

$flowers = new Flower();

if (isset($_GET['flower_id'])) {
    $flowerId = $_GET['flower_id'];
    $flowerDetails = $flowers->getFlowerById($flowerId);

    if ($flowerDetails) {
        ?>
        <div class="flower-details">
            <h1 class="titullii">
                <?= $flowerDetails['flower_name'] ?>
            </h1>
            <img class="flower-imgg" src="./images/<?= $flowerDetails['image'] ?>" alt="<?= $flowerDetails['flower_name'] ?>">
            <p id="cmimi-lule">$
                <?= $flowerDetails['price'] ?>
            </p>
        </div>
        <?php
    } else {
        echo "<p>Flower not found!</p>";
    }
} else {
    echo "<p>Invalid flower ID!</p>";
}

include("footer.php");
?>