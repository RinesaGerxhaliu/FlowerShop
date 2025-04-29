<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flowershop</title>
    <link rel="stylesheet" href="./assets/index.css">
    <link rel="stylesheet" href="./assets/mainStyle.css">
    <link rel="stylesheet" href="./assets/main.css">
    <link rel="stylesheet" href="./assets/winterCollection.css">
    <link rel="stylesheet" href="./assets/login.css">
    <link rel="stylesheet" href="./assets/register.css">
    <link rel="stylesheet" href="./assets/profile.css">
    <link rel="stylesheet" href="./assets/dashboard.css">

    <link rel="stylesheet" href="assets/AU.css">
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.4.2/css/fontawesome.min.css"
        integrity="sha384-BY+fdrpOd3gfeRvTSMT+VUZmA728cfF9Z2G42xpaRkUGu2i3DyzpTURDo5A6CaLK" crossorigin="anonymous">
    <script src="./assets/script.js" defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <div class="mbiheader">
        <p>Same day Auckland delivery orders placed before 1 pm weekdays</p>
    </div>
    <header>
        <div class="headeri">
            <a href="Homepage.php"><img src="./images/blumenshop_com_logo.svg" class="logo"></a>
            <div class="menu-toggle" id="mobile-menu">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>

        <ul class="listat">
            <a href="Homepage.php">
                <li>Home</li>
            </a>
            <a href="ShopPage.php">
                <li>Shop Blooms</li>
            </a>
            <a href="WinterCollection.php">
                <li>Winter Collection</li>
            </a>
            <a href="AboutUs.php">
                <li>About Us</li>
            </a>
            <a href="ContactUs.php">
                <li>Contact Us</li>
            </a>

            <?php
            if (isset($_SESSION['logged_in']) && $_SESSION['logged_in']) {
                echo '<a href="dashboard.php"><li>Dashboard</li></a>';
                echo '<a href="logout.php"><li>Logout</li></a>';
            } else {
                echo '<a href="login.php"><li>Sign In</li></a>';
            }
            if (isset($_SESSION['logged_in']) && $_SESSION['logged_in']) {
                echo '<a href="profile.php"><li><i class="fa fa-user"></i>
                ' . $_SESSION['username'] . '</li></a>';
            }
            ?>

        </ul>
    </header>