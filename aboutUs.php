<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>About Us</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="favicon.ico" rel="icon" type="image/x-icon">
    <link rel="stylesheet" href="css/aboutUs.css">
    <script src="js/common.js"></script>
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
            <a href="aboutUs.php"><strong>About Us</strong></a>
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

<div class="top-panel">
    <div class="top-large-name">
        <h1>Team PG Finder</h1>
    </div>
    <div class="top-lower-container">
        <img src="img/Logo/png/logo-color.png" alt="face-icon" aria-label="face-icon">
        <div class="top-lower-text">
            <p>
                The website known as PG Finder is intended to be of assistance to students and working professionals
                located anywhere in India who are looking for an appropriate place to call home. This becomes an
                extremely important consideration when talking about housing possibilities in a new location for
                college students. Students will benefit from using this tool because it was built by members of Team
                PG Finder who have personal experience with the problem being addressed here.
            </p>
            <a>link to GitHub repo</a>
        </div>
    </div>
</div>

<div class="hr-under-nav">
    <hr>
</div>

<div class="tech-stack">
    <h2>Tech Stack</h2>
    <div class="tech-icons">
        <div class="each-tech-icon">
            <h3>HTML</h3>
            <img src="img/tech-stack/icons8-html-5-480.png" alt="HTML icon" onclick="gotoLink('')">
        </div>
        <div class="each-tech-icon">
            <h3>CSS</h3>
            <img src="img/tech-stack/icons8-css3-240.png" alt="CSS icon">
        </div>
        <div class="each-tech-icon">
            <h3>JavaScript</h3>
            <img src="img/tech-stack/icons8-javascript-480.png" alt="JS icon">
        </div>
        <div class="each-tech-icon">
            <h3>PHP</h3>
            <img src="img/tech-stack/icons8-php-logo-512.png" alt="PHP icon">
        </div>
        <div class="each-tech-icon">
            <h3>MySQL</h3>
            <img src="img/tech-stack/icons8-mysql-logo-480.png" alt="MySQL">
        </div>
    </div>
</div>

<div class="hr-under-nav">
    <hr>
</div>

<div class="members-title">
    Team Members
</div>

<div class="members-info">
    <div class="top-member">
        <div class="member-card">
            <img src="https://media-exp1.licdn.com/dms/image/D4D35AQHFxO4tbpr1Ng/profile-framedphoto-shrink_800_800/0/1663003814221?e=1669964400&v=beta&t=6YW_NAHOX66zvyPo2ZmI4Qe0xTg7aI1zgA4BFYjAkaA" alt="member-image">
            <div class="member-text">
                <h2>Krishna Gautam</h2>
                <h3>201500350</h3>
                <div class="member-text-links">
                    <a href="https://www.linkedin.com/in/gtmkr1234/">LinkedIn</a>
                    <a href="https://github.com/gtmkr1234">GitHub</a>
                </div>
            </div>
        </div>
        <div class="member-card">
            <img src="https://media-exp1.licdn.com/dms/image/C4D03AQEG1MqDs7qEIg/profile-displayphoto-shrink_800_800/0/1668100266545?e=1674691200&v=beta&t=dg4Gso3tNxoTkUN1R5BkInncRcCugyvTYLMoU_WVWG8" alt="member-image">
            <div class="member-text">
                <h2>Priyanshi</h2>
                <h3>201500525</h3>
                <div class="member-text-links">
                    <a href="https://www.linkedin.com/in/pri-mittal2409/">LinkedIn</a>
                    <a href="https://github.com/priyanshi-mittal">GitHub</a>
                </div>
            </div>
        </div>
        <div class="member-card">
            <img src="https://media-exp1.licdn.com/dms/image/C4D03AQE67Wllvm6UKA/profile-displayphoto-shrink_800_800/0/1659117152581?e=1674691200&v=beta&t=QAxc58m8VRmsUbynW2Z4cYeWpx5vBDndoZFyYGuQOe0" alt="member-image">
            <div class="member-text">
                <h2>Aryan Upadhyay</h2>
                <h3>201500160</h3>
                <div class="member-text-links">
                    <a href="https://www.linkedin.com/in/aryan-upa/">LinkedIn</a>
                    <a href="https://github.com/aryan-upa">GitHub</a>
                </div>
            </div>
        </div>
    </div>
    <div class="down-member">
        <div class="member-card">
            <img src="img/Rajat.jpeg" alt="member-image">
            <div class="member-text">
                <h2>Rajat Mishra</h2>
                <h3>201500553</h3>
                <div class="member-text-links">
                    <a href="https://www.linkedin.com/in/rajat-mishra-121592258/">LinkedIn</a>
                    <a href="https://github.com/RajatMishra21">GitHub</a>
                </div>
            </div>
        </div>
        <div class="member-card">
            <img src="img/Akash.jpeg" alt="member-image">
            <div class="member-text">
                <h2>Akash Yadav</h2>
                <h3>201500061</h3>
                <div class="member-text-links">
                    <a href="https://www.linkedin.com/in/akash-yadav-034069227">LinkedIn</a>
                    <a href="">GitHub</a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="hr-under-nav">
    <hr>
</div>

<div class="lower-text">
    <h2>✨ <em>BUILT WITH PASSION AND ❤ BY TEAM PG FINDER</em> ✨</h2>
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
</body>
</html>