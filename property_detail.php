<?php
session_start();
require("includes/database_connect.php");

$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : NULL;
$property_id = $_GET['property_id'];

$sql_1 = "SELECT *, p.id AS property_id, p.name AS property_name, c.name AS city_name 
                FROM properties p
                INNER JOIN cities c
                ON p.city_id = c.id
                WHERE p.id = $property_id";
$result_1 = mysqli_query($conn, $sql_1);
if(!$result_1){
    echo "Something went wrong!";
    return;
}

$property = mysqli_fetch_assoc($result_1);
if(!$property){
    echo "Something went wrong!";
    return;
}

$sql_2 = "SELECT * FROM testimonials WHERE property_id = $property_id";
$result_2 = mysqli_query($conn, $sql_2);
if(!$result_2){
    echo "Something went wrong!";
    return;
}

$testimonials = mysqli_fetch_all($result_2, MYSQLI_ASSOC);

$sql_3 = "SELECT a.*
                FROM amenities a
                INNER JOIN properties_amenities pa ON a.id = pa.amenity_id
                WHERE pa.property_id = $property_id";
$result_3 = mysqli_query($conn, $sql_3);
if(!$result_3){
    echo "Something went wrong!";
    return;
}

$amenities = mysqli_fetch_all($result_3, MYSQLI_ASSOC);

$sql_4 = "SELECT * FROM interested_users_properties WHERE property_id = $property_id";
$result_4 = mysqli_query($conn, $sql_4);
if(!$result_4){
    echo "Something went wrong!";
    return;
}

$interested_users = mysqli_fetch_all($result_4, MYSQLI_ASSOC);
$interested_users_count = mysqli_num_rows($result_4);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PG-Finder| Properties</title>

    <?php
    include "includes/head_links.php";
    ?>

    <link href="css/property_detail.css" rel="stylesheet" />
    <link href="css/style.css" rel="stylesheet" />
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
        <li class="breadcrumb-item">
            <a href="property_list.php?city=<?= $property['city_name']; ?>"><?= $property['city_name']; ?></a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">
            <?= $property['property_name']; ?>
        </li>
    </ol>
</nav>

<div id="property-images" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <?php
        $property_images = glob("img/properties/".$property['property_id']."/*" );
        foreach ($property_images as $index => $property_image) {
            ?>
            <li data-target="#property-images" data-slide-to="<?= $index; ?>" class="<?= $index == 0 ? "active":""; ?>"></li>
            <?php
        }
        ?>
    </ol>
    <div class="carousel-inner">
        <?php
        foreach($property_images as $index => $property_image) {
            ?>
            <div class="carousel-item <?= $index == 0? "active":"" ?>">
                <img class="d-block w-100" src="<?= $property_image ?>" alt="slide">
            </div>
            <?php
        }
        ?>
    </div>
    <a class="carousel-control-prev" href="#property-images" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#property-images" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>

<div class="property-summary page-container">
    <div class="row no-gutters justify-content-between">
        <?php
        $total_rating = ($property['rating_clean'] + $property['rating_food'] + $property['rating_safety']) / 3;
        $total_rating = round($total_rating, 1);
        ?>
        <div class="star-container" title="<?= $total_rating ?>">
            <?php
            $rating = $total_rating;
            for($i = 0; $i < 5; $i++) {
                if($rating <= $i + 0.8) {
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
            $is_interested = false;
            foreach($interested_users as $interested_user) {
                if($interested_user['user_id'] == $user_id) {
                    $is_interested = true;
                }
            }
            if ($is_interested) {
                ?>
                <i class="is-interested-image fas fa-heart"></i>
                <?php
            } else {
                ?>
                <i class="is-interested-image far fa-heart"></i>
                <?php
            }
            ?>
            <div class="interested-text">
                <span class="interested-user-count"><?= $interested_users_count; ?></span> interested
            </div>
        </div>
    </div>
    <div class="detail-container">
        <div class="property-name"><?= $property['property_name']?></div>
        <div class="property-address"><?= $property['address']?></div>
        <div class="property-gender">
            <?php
            if($property['gender'] == "male") {
                ?>
                <img src="img/male.png" />
                <?php
            } elseif ($property['gender'] == "female") {
                ?>
                <img src="img/female.png" />
                <?php
            } else {
                ?>
                <img src="img/unisex.png" />
                <?php
            }
            ?>
        </div>
    </div>
    <div class="row no-gutters">
        <div class="rent-container col-6">
            <div class="rent">₹ <?= number_format($property['rent']); ?>/-</div>
            <div class="rent-unit">per month</div>
        </div>
    </div>
</div>

<div class="property-amenities">
    <div class="page-container">
        <h1>Amenities</h1>
        <div class="row justify-content-between">
            <div class="col-md-auto">
                <h5>Building</h5>
                <?php
                foreach ($amenities as $amenity) {
                    if($amenity['type'] == "Building") {
                        ?>
                        <div class="amenity-container">
                            <img src="img/amenities/<?= $amenity['icon'] ?>.svg">
                            <span><?= $amenity['name'] ?></span>
                        </div>
                        <?php
                    }
                }
                ?>
            </div>

            <div class="col-md-auto">
                <h5>Common Area</h5>
                <?php
                foreach($amenities as $amenity) {
                    if( $amenity['type'] == "Common Area") {
                        ?>
                        <div class="amenity-container">
                            <img src="img/amenities/<?= $amenity['icon'] ?>.svg">
                            <span><?= $amenity['name'] ?></span>
                        </div>
                        <?php
                    }
                }
                ?>
            </div>

            <div class="col-md-auto">
                <h5>Bedroom</h5>
                <?php
                foreach ($amenities as $amenity) {
                    if ($amenity['type'] == "Bedroom") {
                        ?>
                        <div class="amenity-container">
                            <img src="img/amenities/<?= $amenity['icon'] ?>.svg">
                            <span><?= $amenity['name'] ?></span>
                        </div>
                        <?php
                    }
                }
                ?>
            </div>

            <div class="col-md-auto">
                <h5>Washroom</h5>
                <?php
                foreach ($amenities as $amenity) {
                if ($amenity['type'] == "Washroom") {
                ?>
                <div class="amenity-container">
                    <img src="img/amenities/<?= $amenity['icon'] ?>.svg">
                    <span><?= $amenity['name'] ?></span>
                </div>
            </div>
            <?php
            }
            }
            ?>
        </div>
    </div>
</div>
</div>

<div class="property-about page-container">
    <h1>About the Property</h1>
    <p><?= $property['description'] ?></p>
</div>

<div class="property-rating">
    <div class="page-container">
        <h1>Property Rating</h1>
        <div class="row align-items-center justify-content-between">
            <div class="col-md-6">
                <div class="rating-criteria row">
                    <div class="col-6">
                        <i class="rating-criteria-icon fas fa-broom"></i>
                        <span class="rating-criteria-text">Cleanliness</span>
                    </div>
                    <div class="rating-criteria-star-container col-6" title="<?= $property['rating_clean'] ?>">
                        <?php
                        $rating = $property['rating_clean'];
                        for($i = 0; $i < 5; $i++) {
                            if($rating >= $i + 0.8) {
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
                </div>

                <div class="rating-criteria row">
                    <div class="col-6">
                        <i class="rating-criteria-icon fas fa-utensils"></i>
                        <span class="rating-criteria-text">Food Quality</span>
                    </div>
                    <div class="rating-criteria-star-container col-6" title="<?= $property['rating_food'] ?>">
                        <?php
                        $rating = $property['rating_food'];
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
                </div>

                <div class="rating-criteria row">
                    <div class="col-6">
                        <i class="rating-criteria-icon fa fa-lock"></i>
                        <span class="rating-criteria-text">Safety</span>
                    </div>
                    <div class="rating-criteria-star-container col-6" title="<?= $property['rating_safety'] ?>">
                        <?php
                        $rating = $property['rating_safety'];
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
                </div>
            </div>

            <div class="col-md-4">
                <div class="rating-circle">
                    <?php
                    $total_rating = ($property['rating_clean'] + $property['rating_food'] +$property['rating_safety']) / 3;
                    $total_rating = round($total_rating,1);
                    ?>
                    <div class="total-rating"><?= $total_rating ?></div>
                    <div class="rating-circle-star-container">
                        <?php
                        $rating = $total_rating;
                        for ($i = 0; $i < 5; $i++) {
                            if($rating >= $i + 0.8) {
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
                </div>
            </div>
        </div>
    </div>
</div>


<?php
include "includes/footer.php";
?>

<script type="text/javascript" src="js/property_detail.js"></script>
</body>

</html>
