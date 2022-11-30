<?php
session_start();
require("includes/database_connect.php");

if(!isset($_SESSION['user_id'])){
    header("location: home.php");
    die();
}

$user_id = $_SESSION['user_id'];

$sql_1 = "SELECT * FROM users WHERE id = $user_id";
$result_1 = mysqli_query($conn, $sql_1);
if(!$result_1){
    echo "Something went wrong!";
    return;
}

$user = mysqli_fetch_assoc($result_1);
if(!$user){
    echo "Something went wrong!";
    return;
}

$sql_2 = "SELECT * FROM interested_users_properties iup 
                INNER JOIN properties p 
                ON iup.property_id = p.id
                WHERE iup.user_id = $user_id";
$result_2 = mysqli_query($conn, $sql_2);
if(!$result_2){
    echo "Something went wrong!";
    return;
}

$interested_properties = mysqli_fetch_all($result_2, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | PG Life</title>

    <?php
    include "includes/head_links.php";
    ?>

    <link href="css/dashboard.css" rel="stylesheet" />
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
            Dashboard
        </li>
    </ol>
</nav>

<div class="user-profile page-container">
    <h1>My Profile</h1>
    <div class="row">
        <div class="profile-picture col-md-3">
            <i class="fas fa-user text-center"></i>
        </div>
        <div class="col-md-9">
            <div class="row align-items-end">
                <div class="col-9">
                    <div class="user-name"><?= $user['full_name'] ?></div>
                    <div class="user-email"><?= $user['email'] ?></div>
                    <div class="user-phone"><?= $user['phone'] ?></div>
                    <div class="user-college"><?= $user['college_name']?></div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
if(count($interested_properties) > 0)
{
    ?>

    <div class="interested-properties">
        <div class="page-container">
            <h1>My Interested Properties</h1>

            <?php
            foreach ($interested_properties as $property) {
                $property_images = glob("img/properties/" . $property['id'] . "/*");
                ?>
                <div class="property-card property-id-<?= $property['id'] ?> row">
                    <div class="image-container col-md-4">
                        <img src="<?= $property_images[0] ?>" />
                    </div>
                    <div class="content-container col-md-8">
                        <div class="row no-gutters justify-content-between">
                            <?php
                            $total_rating = ($property['rating_clean'] + $property['rating_food'] + $property['rating_safety'])/3;
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
                                <i class="is-interested-image fas fa-heart" property_id="<?= $property['id'] ?>"></i>
                            </div>
                        </div>
                        <div class="detail-container">
                            <div class="property-name"><?= $property['name'] ?></div>
                            <div class="property-address"><?= $property['address'] ?></div>
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
            ?>
        </div>
    </div>
    <?php
}
?>
<?php
include "includes/footer.php";
?>

<script type="text/javascript" src="js/dashboard.js"></script>
</body>

</html>