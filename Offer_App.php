<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatable" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./src/css/header.css">
    <link rel="stylesheet" type="text/css" href="./src/css/login.css">
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

<form action ="offer_application.php"method="post">
<h1><b><u> Special Offers</u></b></h1>
<fieldset>
<legend> Offer Details</legend>
    Full Name:<br>
      <input type="text"name="name"><br>
    E-Mail:<br>
      <input type="text"name="e-mail"><br>
    Address:<br>
      <textarea name="Address"name="Address"></textarea><br>
    Phone Number:<br>
      <input type="text"name="number"><br>
	 Province:<br>
        <select name="provinces"size="5">
			  <option value="S">Southern</option>
			  <option value="N">Northern</option>
			  <option value="Sa">Sabaragmuwa</option>
			  <option value="Nc">North Central</option>
			  <option value="Uva ">Uva </option>
			  <option value="C">Central</option>
			  <option value="W">Western</option>
			  <option value="E">Eastern</option>
			  <option value="Nw">North Western</option>
	    </select> <br>
    offers:<br><u>(you should select only one offer)</u><br>
    <br>
    <input type="radio"name="offer"value="facebook"/>
    <label for="facebook">Facebook ads-10% discount</label>
    <br>
    <input type="radio"name="offer"value="instagram"/>
    <label for="facebook">Instagram ads-15% discount</label>
    <br>
    <input type="radio"name="offer"value="Youtube"/>
    <label for="facebook">Youtube ads-20% discount</label>
    <br>
    <input type="Submit"value="submit"/>
    <input type="reset"value="reset"/>
    <br>
</fieldset>
</form>
</body>
</html>