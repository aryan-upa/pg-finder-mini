<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login | Signup</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/logUp.css">
</head>
<body>
    <div class="hr-under-nav">
        <hr>
    </div>

    <div class="panel">
        <div class="card sign-up">
            <h1>Sign Up & Join</h1>
            <h3>Create your account in just a few steps <br> and step into the world-class homes.</h3>
            <form id="signup-form" class="form" role="form" method="post" action="api/signup_submit.php">
                <div class="field">
                    <label for="name">Name: </label>
                    <input type="text" id="name" class="form-control" name="full_name" placeholder="Full Name" maxlength="30" required>
                </div>
                <div class="field">
                    <label for="phone-number">Phone: </label>
                    <input type="text" class="form-control" id="phone-number" name="phone" placeholder="Phone Number" maxlength="10" minlength="10" required>
                </div>
                <div class="field">
                    <label for="email">Email: </label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$">                </div>
                <div class="field">
                    <label for="pass">Password: </label>
                    <input type="password" id="pass" class="form-control" name="password" placeholder="Password" minlength="6" required>

                </div>
                <div class="field">
                    <label for="college">College Name: </label>
                    <input type="text" id="college" class="form-control" name="college_name" placeholder="College Name" maxlength="150" required>
                </div>
                <div class="field">
                    I'm a
                    <div class="radio-el">
                        <label for="gender-male">Male : </label>
                        <input type="radio" class="ml-3" id="gender-male" name="gender" value="male" />
                    </div>
                    <div class="radio-el">
                        <label for="gender-female">Female : </label>
                        <input type="radio" class="ml-3" id="gender-female" name="gender" value="female" />
                    </div>
                </div>
                <button type="submit">Create Account</button>
            </form>
        </div>

        <div class="vertical-bar"></div>
        <hr class="hr-bar">

        <div class="card log-in">
            <h1>Welcome Back<br>Login</h1>
            <h3>Continue your search for homes <br> and conclude it with a smile.</h3>
            <form id="login-form" class="form" role="form" method="post" action="api/login_submit.php">
                <div class="field">
                    <label for="log-email">Email: </label>
                    <input type="email" id="log-email" class="form-control" name="email" placeholder="Email" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$">
                </div>
                <div class="field">
                    <label for="log-pass">Name: </label>
                    <input type="password" class="form-control" id="log-pass" name="password" placeholder="Password" minlength="6" required>
                </div>
                <button type="submit">Log In</button>
            </form>
        </div>
    </div>

    <script src="js/common.js"></script>
</body>
</html>