<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html" charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome | PG Finder</title>

    <?php
    include "includes/head_links.php";
    ?>

    <link href="css/home.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/common.js"></script>
</head>
<style>
    nav {
        line-height: 1.15;
        font-family: 'Poppins', sans-serif;
    }

    #search-form {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .login-button {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .home-name {
        display: flex;
        align-items: center;
    }

    .home-name p {
        margin: 0;
    }

    .home-name a {
        display: revert;
        padding: 0;
    }

    a:hover {
        text-decoration: none;
    }
</style>
<body>
<nav>
    <div class="icon">
        <img src="img/Logo/png/logo-color.png" alt="icon" onclick="gotoLink('index.php')">
    </div>

    <div class="links" style="column-gap: 2vw;">
        <div class="search-button">
            <form id="search-form" action="property_list.php" method="GET">
                <label for="search-city"></label><input class="form-control" type="text" name="city" id="search-city" placeholder="search">
            </form>
        </div>
        <div class="text-links">
            <a href="aboutUs.php">About Us</a>
            |
            <a href="home.php"><strong>Homes</strong></a>
        </div>
        <div class="home-name">
            <?php
            if (isset($_SESSION['user_id'])) {
                ?>
                <p>Hi <?= $_SESSION["full_name"] ?>, <a class="nav-link" href="dashboard.php"> Dashboard </a></p>
                <?php
            }
            ?>
        </div>
        <?php
        if (!isset($_SESSION['user_id'])) {
            ?>
            <div class="login-button">
                <button onclick="gotoLink('logup.php')">Login</button>
            </div>
            <?php
        } else {
            ?>

            <div class="login-button">
                <button onclick="gotoLink('logout.php')">Logout</button>
            </div>
            <?php
        }
        ?>
    </div>
</nav>

<div class="landing-image">
    <div class="search-box">
        <h2 class="white text-center">
            Find your desirable place here!!!
        </h2>
        <form id="search-form" action="property_list.php" method="GET">
            <div class="input-group">
                <input class="form-control" type="text" name="city" id="search-city" placeholder="Enter your city to search for PGs" />
                <div class="input-group-append">
                    <button class="btn btn-secondary" type="submit">
                        <i class="fa fa-search"></i>
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="page-container">
    <h1 class="text-center">
        Major Cities
    </h1>
    <div class="row">
        <div class="col-md-3 city-container">
            <a href="property_list.php?city=Delhi" >
                <div class="city">
                    <img src="img/delhi.png" />
                </div>
            </a>
        </div>
        <div class="col-md-3 city-container">
            <a href="property_list.php?city=Mumbai" >
                <div class="city">
                    <img  src="img/mumbai.png" />
                </div>
            </a>
        </div>
        <div class="col-md-3 city-container">
            <a href="property_list.php?city=Gurugram" >
                <div class="city">
                    <img src="img/gurugram.png" />
                </div>
            </a>
        </div>
        <div class="col-md-3 city-container">
            <a href="property_list.php?city=Mathura" >
                <div class="city">
                    <img src="img/mathura.png" />
                </div>
            </a>
        </div>
    </div>
</div>

<?php
include "includes/footer.php";
?>

<script type="text/javascript" src="js/home.js"></script>
</body>

</html>