<?php
include("pages/header.php");
include("auth/db_connection.php");
include("auth/user.php");
include("auth/flowers.php");

$dbConnection = DatabaseConnection::getInstance();
$conn = $dbConnection->getConnection();
$flowers = new Flower();
$user = new User($conn);

$flowersByCategoryBestSellers = $flowers->getFlowersByCategory("best_seller");
$flowersByCategoryPlants = $flowers->getFlowersByCategory("plants_trees_collection");
$flowersByCategoryWinter = $flowers->getFlowersByCategory("winter_collection");
$flowersByCategoryDried = $flowers->getFlowersByCategory("dried_flowers_collection");

?>

<main>

    <div id="slider-container">
        <div id="slider">
            <div class="slide"><img src="./images/flower1.png" alt="Flower 1"></div>
            <div class="slide"><img src="./images/tree1.webp" alt="Flower 2"></div>
            <div class="slide"><img src="./images/flower3.png" alt="Flower 3"></div>
            <div class="slide"><img src="./images/plant2.webp" alt="plant2"></div>
            <div class="slide"><img src="./images//a4.webp" alt="plant2"></div>
            <div class="slide"><img src="./images/plant3.webp" alt="plant3"></div>
            <div class="slide"><img src="./images/plant4.webp" alt="plant2"></div>
        </div>
        <button class="prev" onclick="prevSlide()">&#10094;</button>
        <button class="next" onclick="nextSlide()">&#10095;</button>
    </div>

    <div class="collection">
        <p>Best Sellers Collection</p>
    </div>
    <div class="flowers">
        <?php foreach ($flowersByCategoryBestSellers as $flower): ?>
            <div class="imageshop">
                <img class="imageshop-img" src="./images/<?= $flower['image'] ?>" alt="bestsell1">
                <div class="underimgg">
                    <a href="SingleFlower.php?flower_id=<?= $flower['flower_id'] ?>">
                        <?= $flower['flower_name'] ?>
                    </a>
                    <p id="cmimi">$
                        <?= $flower['price'] ?>
                    </p>

                </div>
                <div class="underimage-added">
                    <p>Added on:
                        <?= $flower['added_date'] ?>
                    </p>
                    <p>Added by:
                        <?= $user->getUserById($flower['addedbyuser'])['username'] ?>
                    </p>

                </div>
            </div>
        <?php endforeach; ?>
    </div>


    <div class="collection">
        <p>Plants & Trees Collection</p>
    </div>

    <div class="flowers">
        <?php foreach ($flowersByCategoryPlants as $flower): ?>
            <div class="imageshop">
                <img class="imageshop-img" src="./images/<?= $flower['image'] ?>" alt="bestsell1">
                <div class="underimgg">
                    <a href="SingleFlower.php?flower_id=<?= $flower['flower_id'] ?>">
                        <?= $flower['flower_name'] ?>
                    </a>
                    <p id="cmimi">$
                        <?= $flower['price'] ?>
                    </p>

                </div>
                <div class="underimage-added">
                    <p>Added on:
                        <?= $flower['added_date'] ?>
                    </p>
                    <p>Added by:
                        <?= $user->getUserById($flower['addedbyuser'])['username'] ?>
                    </p>

                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <div class="collection">
        <p>Winter Collection</p>
    </div>

    <div class="flowers">
        <?php foreach ($flowersByCategoryWinter as $flower): ?>
            <div class="imageshop">
                <img class="imageshop-img" src="./images/<?= $flower['image'] ?>" alt="bestsell1">
                <div class="underimgg">
                    <a href="SingleFlower.php?flower_id=<?= $flower['flower_id'] ?>">
                        <?= $flower['flower_name'] ?>
                    </a>
                    <p id="cmimi">$
                        <?= $flower['price'] ?>
                    </p>

                </div>
                <div class="underimage-added">
                    <p>Added on:
                        <?= $flower['added_date'] ?>
                    </p>
                    <p>Added by:
                        <?= $user->getUserById($flower['addedbyuser'])['username'] ?>
                    </p>

                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <div class="collection">
        <p>Dried Flowers Collection</p>
    </div>

    <div class="flowers">
        <?php foreach ($flowersByCategoryDried as $flower): ?>
            <div class="imageshop">
                <img class="imageshop-img" src="./images/<?= $flower['image'] ?>" alt="bestsell1">
                <div class="underimgg">
                    <a href="SingleFlower.php?flower_id=<?= $flower['flower_id'] ?>">
                        <?= $flower['flower_name'] ?>
                    </a>
                    <p id="cmimi">$
                        <?= $flower['price'] ?>
                    </p>

                </div>
                <div class="underimage-added">
                    <p>Added on:
                        <?= $flower['added_date'] ?>
                    </p>
                    <p>Added by:
                        <?= $user->getUserById($flower['addedbyuser'])['username'] ?>
                    </p>

                </div>
            </div>
        <?php endforeach; ?>
    </div>
    </div>
</main>

<?php include("footer.php") ?>