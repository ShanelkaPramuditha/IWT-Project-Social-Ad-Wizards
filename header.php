<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatable" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="assets/css/header.css">
    <link rel="stylesheet" type="text/css" href="assets/css/login.css">
    <!-- Title of the page -->
    <title>Social Ad Wizards</title>
    <!-- JavaScript Script Files -->
    <script src="assets/js/login.js"></script>
</head>

<body>
<div class="overlay" id="overlay" onclick="closeLoginForm()"></div>

<!-- Header Panel of the site -->
<header>
    <div class="header">Social Ad Wizards</div>
    <div class="container">
        <!-- Logo Image -->
        <img src="assets/images/site-img/logo.png" alt="LOGO" class="logo">
        <!-- Navigation Panel Buttons -->
        <nav class="navbar">
            <ul>
                <li><a href="index.php" class="active">Home</a></li>
                <li><a href="gallery.php">Gallery</a></li>
                <li><a href="services.php">Services</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="contact.php">Contact</a></li>
                <input type="text" placeholder="Search.." class="search">
            </ul>
        </nav>
        <!-- Login image -->
        <img src="assets/images/site-img/login.png" alt="LOGIN" onclick="openLoginForm()" class="login">
    </div>
</header>

<!-- Login Pop UP FORM -->
<div class="form-popup" id="loginForm">
  <form action="/action_page.php" class="form-container">
    <h1>Login</h1>

    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="email" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required>

    <button type="submit" class="btn">Login</button>
    

    <!-- Shift to the sign up page -->
    <label>You haven't an account <a href="signup.php">click here</a>
    </label>
    
    <button type="button" class="btn cancel" onclick="closeLoginForm()">Close</button>


  </form>
</div>
</body>
</html>