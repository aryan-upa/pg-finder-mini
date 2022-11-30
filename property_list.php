<?php
session_start();
require "includes/database_connect.php";

$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : NULL;
$city_name = $_GET["city"];

$sql_1 = "SELECT * FROM cities WHERE name = '$city_name'";
$result_1 = mysqli_query($conn, $sql_1);
if (!$result_1) {
    echo "Something went wrong!";
    return;
}

$city = mysqli_fetch_assoc($result_1);
if (!$city) {
    echo "Sorry! We do not have any PG listed in this city.";
    return;
}

$city_id = $city['id'];

$sql_2 = "SELECT * FROM properties WHERE city_id = $city_id";
$result_2 = mysqli_query($conn, $sql_2);
if (!$result_2) {
    echo "Something went wrong!";
    return;
}

$properties = mysqli_fetch_all($result_2, MYSQLI_ASSOC);

$sql_3 = "SELECT * 
                FROM interested_users_properties iup
                INNER JOIN properties p ON iup.property_id = p.id
                WHERE p.city_id = $city_id";
$result_3 = mysqli_query($conn, $sql_3);
if (!$result_3) {
    echo "Something went wrong!";
    return;
}

$interested_users_properties = mysqli_fetch_all($result_3, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Best PGs in <?= $city['name']; ?> | PG Finder</title>

    <?php
    include "includes/head_links.php";
    ?>

    <link href="css/property_list.css" rel="stylesheet" />
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
            <a href="home.php">Homes</a>
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
<nav aria-label="breadcrumb">
    <ol class="breadcrumb py-2">
        <li class="breadcrumb-item">
            <a href="home.php">Home</a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">
            <?= $city_name; ?>
        </li>
    </ol>
</nav>

<div class="page-container">

    <?php
    foreach ($properties as $property) {
        $property_images = glob("img/properties/" . $property['id'] . "/*");
        ?>
        <div class="property-card property-id-<?= $property['id'] ?> row">
            <div class="image-container col-md-4">
                <img src="<?= $property_images[0] ?>" />
            </div>
            <div class="content-container col-md-8">
                <div class="row no-gutters justify-content-between">
                    <?php
                    $total_rating = ($property['rating_clean'] + $property['rating_food'] + $property['rating_safety']) / 3;
                    $total_rating = round($total_rating, 1);
                    ?>
                    <div class="star-container" title="<?= $total_rating ?>">
                        <?php
                        $rating = $total_rating;
                        for ($i = 0; $i < 5; $i++) {
                            if ($rating >= $i + 0.8) {
                                ?>
                                <i class="fas fa-star"></i>
                                <?php
                            } elseif ($rating >= $i + 0.3) {
                                ?>
                                <i class="fas fa-star-half-alt"></i>
                                <?php
                            } else {
                                ?>
                                <i class="far fa-star"></i>
                                <?php
                            }
                        }
                        ?>
                    </div>
                    <div class="interested-container">
                        <?php
                        $interested_users_count = 0;
                        $is_interested = false;
                        foreach ($interested_users_properties as $interested_user_property) {
                            if ($interested_user_property['property_id'] == $property['id']) {
                                $interested_users_count++;

                                if ($interested_user_property['user_id'] == $user_id) {
                                    $is_interested = true;
                                }
                            }
                        }

                        if ($is_interested) {
                            ?>
                            <i class="is-interested-image property-id-<?= $property['id'] ?> fas fa-heart" property_id="<?= $property['id'] ?>"></i>
                            <?php
                        } else {
                            ?>
                            <i class="is-interested-image property-id-<?= $property['id'] ?> far fa-heart" property_id="<?= $property['id'] ?>"></i>
                            <?php
                        }
                        ?>
                        <div class="interested-text">
                            <span class="interested-user-count property-id-<?= $property['id'] ?> "><?= $interested_users_count ?></span> interested
                        </div>
                    </div>
                </div>
                <div class="detail-container">
                    <div class="property-name"><?= $property['name'] ?></div>
                    <div class="property-address"><?= $property['address'] ?></div>
                    <div class="property-gender">
                        <?php
                        if ($property['gender'] == "male") {
                            ?>
                            <img src="img/male.png" />
                            <?php
                        } else{
                            ?>
                            <img src="img/female.png" />
                            <?php
                        }
                        ?>
                    </div>
                </div>
                <div class="row no-gutters">
                    <div class="rent-container col-6">
                        <div class="rent">₹ <?= number_format($property['rent']) ?>/-</div>
                        <div class="rent-unit">per month</div>
                    </div>
                    <div class="button-container col-6">
                        <a href="property_detail.php?property_id=<?= $property['id'] ?>" class="btn btn-primary">View</a>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }

    if (count($properties) == 0) {
        ?>
        <div class="no-property-container">
            <p>No PG to list</p>
        </div>
        <?php
    }
    ?>
</div>

<?php
include "includes/footer.php";
?>

<script type="text/javascript" src="js/property_list.js"></script>
</body>

</html>