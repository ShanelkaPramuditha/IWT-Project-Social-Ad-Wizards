<!-- Header Navigation Panel -->
<header class="header-container">
    <div class="header-name">Social Ad Wizards</div>
    <!-- Logo Image -->
    <img src="./assets/images/site-img/logo/logo.svg" alt="LOGO" class="header-logo">

    <!-- Navigation Panel Buttons -->
    <nav class="navbar">
        <a href="./index.php">HOME</a>
        <a href="./src/views/gallery.php">GALLERY</a>
        <a href="./src/views/services.php">SERVICES</a>
        <a href="./src/views/about.php">ABOUT</a>
        <a href="./src/views/contact.php">CONTACT</a>
    </nav>
    <!-- Search bar -->
    <div class="search-notify">
        <input type="text" placeholder="Search..">
        <a href="#"><img src="./assets/images/site-img/icons/search.png"></a>
        <a href="#"><img src="./assets/images/site-img/icons/notify-animate.gif"></a>
    </div>

    <!-- Login image -->
    <div class="login-button">
        <a class="openPopup">Sign In</a>
        <a class="openPopup"><img src="./assets/images/site-img/login.png" alt="LOGIN"></a>
    </div>
</header>

<!-- Include log in popup -->

<?php
$currentFile = $_SERVER['PHP_SELF'];

if (strpos($currentFile, 'home.php') !== false) {
    include_once '../components/sign-in/sign-in.php';
} elseif (strpos($currentFile, 'sign-up.php') !== false) {
    include_once '../../components/sign-in/sign-in.php';
}
?>