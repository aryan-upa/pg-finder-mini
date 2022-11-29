<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | PG Life</title>
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
                <p>Hi , <a class="nav-link" href="dashboard.php"> Dashboard </a></p>
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
                        <div class="user-name"></div>
                        <div class="user-email"></div>
                        <div class="user-phone"></div>
                        <div class="user-college"></div>
                    </div>                
                </div>
            </div>
        </div>
    </div>

    <div class="interested-properties">
        <div class="page-container">
            <h1>My Interested Properties</h1>
            <div class="property-card property-id- row">
                <div class="image-container col-md-4">
                    <img src="" />
                </div>
                <div class="content-container col-md-8">
                    <div class="row no-gutters justify-content-between">
                        <div class="star-container" title="">
                                <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                            <i class="far fa-star"></i>
                        </div>
                        <div class="interested-container">
                            <i class="is-interested-image fas fa-heart" property_id=""></i>
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
                        <div class="button-container col-6">
                            <a href="property_detail.php?property_id=" class="btn btn-primary">View</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="js/dashboard.js"></script>
</body>

</html>