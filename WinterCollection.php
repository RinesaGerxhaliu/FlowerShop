<?php
include("header.php");
include("inc/db_connection.php");
include("inc/user.php");
include("inc/flowers.php");

$dbConnection = DatabaseConnection::getInstance();
$conn = $dbConnection->getConnection();
$flowers = new Flower();
$user = new User($conn);

$flowersByCategoryWinter = $flowers->getFlowersByCategory("winter_collection");
?>

<main>

    <div class="firstImage">
        <img src="./images/winterc2.jpg" alt="">
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

    <div class="OrderFlowers" style="pading: 85px!important;">

        <div class="imageInside" style="margin-top: 80px; padding-right: 40px !important;">
            <img src="./images/winter-flower-bouquet.webp" alt="winter-flower-bouquet">
        </div>

        <div class="p-1">
            <h2>Order a winter flower bouquet</h2>
            <p>You want to make someone happy in the dreary winter? No problem with blumenshop.com!</p>
            <p>We send the most beautiful flowers even in winter.</p>
            <p>Whether you are looking for a winter bouquet or something colorful to bring color into the dark season.
            </p>
        </div>

        <div class="p-2">
            <h2>Winter flower bouquet with a gift</h2>
            With us you will find not only beautiful bouquets of flowers suitable for winter, but also small gifts: <ul>
                <li>Chocolates</li>
                <li>Cups</li>
                <li>Vases</li>
            </ul>
        </div>
    </div>

    <hr class="hrline">

    <div class="paragrafat">

        <div class="paragrafi1">
            <h2>Send a bouquet of flowers in winter</h2>
            <p>We provide you with the most colorful and beautiful flowers in the depths of winter, so that even in the
                absence of warm sunshine you feel like spring. With amaryllis, tulips, gerberas and carnations in the
                most beautiful colors, we deliver the most beautiful winter flowers in the cold season</p>
            <p>So ordering flowers online and giving them as a gift is no problem at all in November, December, January
                and February. Our florists will tie your selected winter bouquet on the day of collection, so that it
                arrives at your desired address as if freshly picked. Winter flowers make an especially lovely gift for
                any occasion. After all, we love colorful flowers, especially during the cold season.</p>
        </div>

        <div class="paragrafi2">
            <h2>Popular winter flowers</h2>
            <p>Even in winter, many flowers bloom, that's why this season can convince you with its diversity. So you
                can find many winter flowers in our bouquets.</p>
            <ul>
                <li>Amaryllis: In the pre-Christmas season, the amaryllis is the star of the flowers blooming in winter.
                    It will convince you in different colors, whether with red, pink or white flowers. In the language
                    of flowers, the amaryllis stands for pride and admiration and is therefore the perfect gift to
                    friends, family or nice acquaintances.</li>
                <li>Tulips: In the period after Christmas, the early bloomers delight with their blossoms: In
                    mid-January, the official tulip season starts in the Netherlands. In Amsterdam, all residents are
                    invited to pick a tulip from the city garden. Thousands of tulips shine there in the most beautiful
                    colors. With us you can find this beautiful flower already from the beginning of January until
                    Easter time. Tulips are real classics among winter flowers and giving them as gifts is so much fun.
                    They already give a little taste of spring.</li>
            </ul>
        </div>
    </div>

</main>
<?php include("footer.php") ?>