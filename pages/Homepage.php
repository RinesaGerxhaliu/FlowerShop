<?php
include("auth/db_connection.php");
include("auth/flowers.php");
include("pages/header.php");

$flower = new Flower();
$firstFourFlowers = $flower->getFirstFourFlowers();
?>

<main>
    <div class="main-fillimi">
        <div class="site-desc">
            <h2 class="creations">We Create</h2>
            <p class="p">Unconventional and undeniably beautiful flowers</p>
            <a href="ShopPage.php">
                <p>Shop Fresh Flowers</p>
            </a>
        </div>
        <img src="./images/homebannerfinal.png" alt="lule-1">
    </div>

    <div class="bestsell">
        <h2>Shop Best Sellers</h2>
    </div>

    <div class="fotografit">
        <?php foreach ($firstFourFlowers as $flower): ?>
            <div class="rubrika">
                <img src="./images/<?= $flower["image"] ?>" alt="" class="img1">
                <div class="underimg">
                    <p>
                        <?= $flower["flower_name"] ?>
                    </p>
                    <p id="cmimi">$
                        <?= $flower["price"] ?>
                    </p>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <div class="visit-bestsellers">
        <a href="ShopPage.php" class="bestsellers-button">SHOP ALL BEST SELLERS</a>
    </div>

    <div class="site-aboutUs">
        <img src="./images/foto-5.png" alt="lule-5">
        <div class="site-desc-2">
            <h2>Our Approach</h2>
            <p>We don't stick to the traditional floristry rules.
                We are passionate about premium and top-quality flowers.</p>
            <p>Every bouquet is carefully thought out, personalised, and unique!</p>
            <div style="margin-top: 33px;">
                <a href="AboutUs.php">About Us</a>
            </div>
        </div>
    </div>

    <div class="site-bestblooms">
        <div class="site-desc-3">
            <h2>Events & Corporate</h2>
            <p>Leave it to the experts.
                You pick the color palette and our artisans will pick the best, freshest florals
                available to create a stunning arrangement for you.</p>

            <a href="AboutUs.php">
                <p>Find Out More</p>
            </a>
        </div>

        <img src="./images/foto-6.png" alt="lule-6">
    </div>

    <div class="shop-map-item">
        <div class="site-desc-4">
            <h2>Visit Our Flower Shop</h2>
            <div>

                <div class="map-and-time">
                    <div class="map-shop">
                        <p>Westfield Mall Newmarket Store</p>
                        <p>277 Broadway, Newmarket,</p>
                        <p>Auckland 2134, New Zealand</p>
                        <p>098 302 0367</p>
                    </div>

                    <div class="shop-working">
                        <p>Monday to Saturday</p>
                        <p>9:00am - 7:00pm</p>
                        <p>Sunday</p>
                        <p>10:00am - 7:00pm</p>
                    </div>
                </div>

            </div>
            <a href="ContactUs.php">
                <p>Get Directions</p>
            </a>
        </div>

        <img src="./images/foto-7.png" alt="lule-7">
    </div>

    <div class="instagram-feed-images">



        <div class="Connections">

            <div class="lineabove-instafeed"></div>

            <div class="text-images-instafeed">
                <div class="insta-feed">
                    <h2>We're even cuter in person.</h2>
                    <p>See some. Share some. #fgflove</p>
                    <p><img src="images/download.jfif" alt=""> BlumenShop</p>
                </div>

                <div class="images-container">
                    <div class="images-c">
                        <img src="./images/foto-8.png" alt="foto-8">
                    </div>

                    <div class="images-c">
                        <img src="./images/foto-9.png" alt="foto-9" ;>
                    </div>

                    <div class="images-c">
                        <img src="./images/foto-10.png" alt="foto-10">
                    </div>
                    <div class="images-c">
                        <img src="./images/foto-11.png" alt="foto-8">
                    </div>

                    <div class="images-c">
                    <img src="./images/foto-12.png" alt="foto-9">
                    </div>

                    <div class="images-c">
                        <img src="./images/foto-13.png" alt="foto-10">
                    </div>
                </div>

            </div>

        </div>
    </div>
</main>

<?php include("footer.php") ?>