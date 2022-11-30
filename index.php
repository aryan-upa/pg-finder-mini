<?php
session_start();

require("./includes/database_connect.php");
$userQuery = "SELECT * from users";
$users = mysqli_num_rows(mysqli_query($conn, $userQuery));
$propertyQuery = "SELECT * from properties";
$properties = mysqli_num_rows(mysqli_query($conn, $propertyQuery));
$cityQuery = "SELECT * from cities";
$cities = mysqli_num_rows(mysqli_query($conn, $cityQuery));
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PG Finder</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="favicon.ico" rel="icon" type="image/x-icon">
</head>
<body>
<nav>
    <div class="icon">
        <img src="img/Logo/png/logo-color.png" alt="icon" onclick="gotoLink('index.php')">
    </div>

    <div class="links">
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

<div class="hr-under-nav">
    <hr>
</div>

<header>
    <div class="header-text">
        <h1>PG FINDER</h1>
        <h3>Your house in a new city.</h3>
        <div class="header-text-links">
            <div class="login-button">
                <button onclick="gotoLink('logup.php')">Login</button>
            </div>
            <div class="discover">
                <button onclick="gotoLink('home.php')">Discover</button>
            </div>
        </div>
    </div>

    <div class="carousal">
        <div class="each-image fade">
            <img src="img/norm/pg.jpg" alt="image1">
            <div class="text"><a href="">Property Name & Address 1</a></div>
        </div>
        <div class="each-image fade">
            <img src="img/norm/pg.jpg" alt="image1">
            <div class="text"><a href="">Property Name & Address 2</a></div>
        </div>
        <div class="each-image fade">
            <img src="img/norm/pg.jpg" alt="image1">
            <div class="text"><a href="">Property Name & Address 3</a></div>
        </div>
        <div class="each-image fade">
            <img src="img/norm/pg.jpg" alt="image1">
            <div class="text"><a href="">Property Name & Address 4</a></div>
        </div>
        <div class="each-image fade">
            <img src="img/norm/pg.jpg" alt="image1">
            <div class="text"><a href="">Property Name & Address 5</a></div>
        </div>
    </div>
</header>


<div class="main-text">
    <p>
        PG - Finder is a technology-based platform for Booking PG, Shared Flat and Rooms by Location with Specific
        requirement by filtering by Location, IT Parks, Land Mark, Price, Room type, Amenities, Gender. Presently we
        have Launched in Platform in Delhi, Noida, and Mathura. We will soon expand to all the Major Cities of the
        Country. Our aim is to student and working professional who are moving to a new city to not worry about a
        place to live.
    </p>
    <div class="face-icon">
        <img src="img/Logo/png/logo-color.png" alt="icon">
    </div>

    <div class="stands-for">
        <h2>Stands for these 3 core values to the <em>home-lookers.</em></h2>
        <div class="values">
            <div class="values-card">
                <img src="img/ill/presence.png" alt="illustration-presence">
                <p>
                    We offer a database that contains PGs, Hostels, and Dorms all throughout the nation in more than
                    1200 locations spread all across India. These homes were selected from a carefully compiled list.
                    This way we provide best of the best homes for our users.
                </p>
            </div>
            <div class="values-card">
                <img src="img/ill/documented.png" alt="illustration-documented">
                <p>
                    We ensure the places listed and the people looking for a stay are selected based on careful
                    filtering criteria so that both parties benefit and the safety of all involved persons is
                    ensured.Our aim and motto are simple and singular.
                </p>
            </div>
            <div class="values-card">
                <img src="img/ill/hospitality.png" alt="illustration-hospitality">
                <p>
                    With each house listed we try to uphold the utmost care of our users and their best interest.
                    Thus, each house listed maintains hospitality and safety as their traditional values. Along with
                    this we also try to list houses which are safe and not other way round.
                </p>
            </div>
        </div>
    </div>
</div>

<div class="working-details">
    <div class="details-card">
        <img src="img/norm/fake-user.jpg" alt="user-icon">
        <h2>Over <?php echo $users ?> Happy users</h2>
    </div>
    <div class="details-card">
        <h2>Over <?php echo $properties ?> Properties listed</h2>
        <img src="img/norm/pg.jpg" alt="property-icon">
    </div>
    <div class="details-card">
        <img src="img/norm/city.jpg" alt="city-icon">
        <h2>In more than <?php echo $cities ?> cities</h2>
    </div>
</div>

<h3 class="testimonial-text">Testimonials</h3>
<div class="testimonials">
    <div class="testi-card">
        <div class="img-container">
            <img src="img/testi/testi-1.jpg" alt="user-image">
        </div>
        <div class="testi-card-text">
            <h4>Ankit Sabharwal : Found his PG in Mathura</h4>
            <p>
                I love this guest house. Owner and his family are amazing and help in any way possible. It is located in
                a nice party of Delhi. Rooms are imple but comfortable but it’s the service that makes it so great.
                Highly recommend
            </p>
        </div>
    </div>
    <div class="testi-card">
        <div class="img-container">
            <img src="img/testi/testi-2.jpg" alt="user-image">
        </div>
        <div class="testi-card-text">
            <h4>Ankita Sharma : Found his PG in Delhi</h4>
            <p>
                I like their hospitality it's really like our home. Mainly it's vegetarian food like it,good ambience.
                Feel really safe here. I am staying 3 years onwards the best PG and home environment. thank you, PG Finder
                for helping me find a home like home.
            </p>
        </div>
    </div>
    <div class="testi-card">
        <div class="img-container">
            <img src="img/testi/testi-3.jpg" alt="user-image">
        </div>
        <div class="testi-card-text">
            <h4>Aman Shahu : Found his Hostel in Mathura</h4>
            <p>
                PG-Finder has been great for us in the past. We've stayed in several places and states and have never
                had a complaint - all have been 5 stars until Sue in Grand Lake, CO cancelled our booking and asked
                almost 3 times the advertised price we paid. I booked at $59 per night which seemed too good to be true.
                I wasn't too happy when the booking was finalized to see that it was actually a lodge, But for the place
                , time, and price, I was thrilled. Immediately after booking, I emailed the host to say how much we were
                looking forward to our visit next year. Within a few minutes I got an email from her saying it was a
                mistake, she cancelled our reservation and offered for us to book again at the rate of $149 per night.
            </p>
        </div>
    </div>
    <div class="testi-card">
        <div class="img-container">
            <img src="img/testi/testi-4.jpg" alt="user-image">
        </div>
        <div class="testi-card-text">
            <h4>Rajat Mishra : Found his kona in Gurgaon</h4>
            <p>
                I have been residing in this PG for more than 2 years and I feel like family here. Home like
                environment. Best for accommodation and food. I will suggest if you are searching any PG you can
                definitely go for PG Finder.
            </p>
        </div>
    </div>
    <div class="testi-card">
        <div class="img-container">
            <img src="img/testi/testi-5.jpg" alt="user-image">
        </div>
        <div class="testi-card-text">
            <h4>Krishna Gautami : Found his thikana at Agra</h4>
            <p>
                Starting from accomodation to food, and to other facilities available, everything was upto the mark. It
                was quite clean with rules of the PG was followed properly. Overall a nice experience.
            </p>
        </div>
    </div>
</div>

<div class="signup-section">
    <h2>CREATE ACCOUNT <br> & <br> START YOUR SEARCH TODAY</h2>
    <div class="create-account-button">
        <button onclick="gotoLink('logup.html')">Create Account</button>
    </div>
</div>

<footer>
    <div class="footer-up">
        <div class="footer-links">
            <a href="home.php">homes</a>
            <a href="logup.php">login</a>
            <a href="logup.php">signup</a>
        </div>

        <div class="other-info">
            <h3>PG Finder built for the <br>students & professionals <a href="home.php">looking for PGs</a><br> and homes throughout the country.</h3>
        </div>

        <div class="contact-us">
            <h3>Contact Us</h3>
            <div class="contact-form">
                <form>
                    <label for="email-contact"></label><input id="email-contact" type="email" name="email" value="email">
                    <label for="content"></label><input id="content" type="text" name="content" value="content">
                    <button type="submit">submit</button>
                </form>
            </div>
        </div>
    </div>
    <div class="footer-text">
        &#169; PG-Builder 2022 | Application Designed by Team PG-Finder.
    </div>
</footer>

<script type="text/javascript" src="js/home.js"></script>
<script src="js/common.js"></script>
</body>
</html>