<nav>
    <div class="icon">
        <img src="img\Logo\png\logo-color.png" alt="icon" onclick="gotoLink('index.php')">
    </div>

    <div class="links">
        <div class="search-button">
            <label for="nav-search"></label>
            <form id="search-form-nav" action="../property_list.php" method="GET">
                <label for="search-city-nav"></label><input class="form-control" type="text" name="city" id="search-city-nav" placeholder="search">
            </form>
        </div>
        <div class="text-links">
            <a onclick="gotoLink('aboutUs.html')">About Us</a>
            |
            <a onclick="gotoLink('home.php')">Homes</a>
        </div>
        <div class="login-button">
            <button onclick="gotoLink('logup.php')">Login</button>
        </div>
    </div>
</nav>
