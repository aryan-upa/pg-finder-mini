<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PG-Finder| Properties</title>
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
                <p>Hi, <a class="nav-link" href="dashboard.php"> Dashboard </a></p>
            </div>
            <div class="login-button">
                <button onclick="gotoLink('logup.php')">Login</button>
            </div>

            <div class="login-button">
                <button onclick="gotoLink('logout.php')">Logout</button>
            </div>
        </div>
    </nav>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb py-2">
            <li class="breadcrumb-item">
                <a href="home.php">Home</a>
            </li>
            <li class="breadcrumb-item">
                <a href="property_list.php?city="></a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">

            </li>
        </ol>
    </nav>

    <div id="property-images" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#property-images" data-slide-to="" class=""></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item ">
                <img class="d-block w-100" src="" alt="slide">
            </div>
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
            <div class="star-container" title="">
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half-alt"></i>
                <i class="far fa-star"></i>
            </div>
            <div class="interested-container">
                <i class="is-interested-image fas fa-heart"></i>
                <i class="is-interested-image far fa-heart"></i>
                <div class="interested-text">
                <span class="interested-user-count"></span> interested
                </div>
            </div>
        </div>
        <div class="detail-container">
            <div class="property-name"></div>
            <div class="property-address"></div>
            <div class="property-gender">
                <img src="img/male.png" />
                <img src="img/female.png" />
                <img src="img/unisex.png" />
            </div>
        </div>
        <div class="row no-gutters">
            <div class="rent-container col-6">
                <div class="rent">₹ /-</div>
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
                    <div class="amenity-container">
                        <img src="img/amenities/">
                        <span></span>
                    </div>
                </div>
                
                <div class="col-md-auto">
                    <h5>Common Area</h5>
                    <div class="amenity-container">
                        <img src="img/amenities/">
                        <span></span>
                    </div>
                </div>

                <div class="col-md-auto">
                    <h5>Bedroom</h5>
                    <div class="amenity-container">
                        <img src="img/amenities/">
                        <span></span>
                    </div>
                </div>

                <div class="col-md-auto">
                    <h5>Washroom</h5>
                    <div class="amenity-container">
                        <img src="img/amenities/">
                        <span></span>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>

    <div class="property-about page-container">
        <h1>About the Property</h1>
        <p></p>
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
                        <div class="rating-criteria-star-container col-6" title="">
                            <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                                <i class="far fa-star"></i>
                        </div>
                    </div>

                    <div class="rating-criteria row">
                        <div class="col-6">
                            <i class="rating-criteria-icon fas fa-utensils"></i>
                            <span class="rating-criteria-text">Food Quality</span>
                        </div>
                        <div class="rating-criteria-star-container col-6" title="<?= $property['rating_food'] ?>">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                            <i class="far fa-star"></i>
                        </div>
                    </div>
                    
                    <div class="rating-criteria row">
                        <div class="col-6">
                            <i class="rating-criteria-icon fa fa-lock"></i>
                            <span class="rating-criteria-text">Safety</span>
                        </div>
                        <div class="rating-criteria-star-container col-6" title="">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                            <i class="far fa-star"></i>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="rating-circle">
                        <div class="total-rating"></div>
                        <div class="rating-circle-star-container">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                            <i class="far fa-star"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript" src="js/property_detail.js"></script>
</body>

</html>
