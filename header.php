<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatable" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="assets/css/header.css">
    <link rel="stylesheet" type="text/css" href="assets/css/login.css">
    <title>Social Ad Wizards</title>
</head>

<body>
<header>
    <div class="container">
        <img src="assets/images/site-img/logo.png" alt="LOGO" class="logo">
        <nav class="navbar">
            <ul>
                <li><a href="index.php" class="active">Home</a></li>
                <li><a href="gallery.php">Gallery</a></li>
                <li><a href="services.php">Services</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="contact.php">Contact</a></li>
            </ul>
        </nav>

            <img src="assets/images/site-img/login.png" alt="LOGIN" onclick="openForm()" class="login">

    </div>
</header>

<div class="form-popup" id="myForm">
  <form action="/action_page.php" class="form-container">
    <h1>Login</h1>

    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="email" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required>

    <button type="submit" class="btn">Login</button>
    <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
  </form>
</div>

<script>
function openForm() {
  document.getElementById("myForm").style.display = "block";
}

function closeForm() {
  document.getElementById("myForm").style.display = "none";
}
</script>

<script src="assets/js/header.js"></script>
</body>
</html>