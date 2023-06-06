<!-- Header Navigation Panel -->
<header class="header-container">
    <div class="header-name">Social Ad Wizards</div>
    <!-- Logo Image -->
    <img src="./assets/images/site-img/logo/logo.svg" alt="LOGO" class="header-logo">

    <!-- Admin dashboard header panel ------------------------------------------------------------------------------------------------>
    <?php if (strpos($_SERVER['PHP_SELF'], 'dashboard-admin.php') == TRUE):?>
    <!-- Navigation Panel Buttons -->
    <nav class="navbar">
        <a href="./src/views/admin/dashboard-admin.php">DASHBOARD</a>
    </nav>
    <!-- Login image -->
    <div class="login-button">
        <a class="openPopup">ADMIN</a>
        <a class="openPopup"><img src="./assets/images/site-img/login.png" alt="ADMIN"></a>
    </div>

    <!-- Manager Dashboard header panel ---------------------------------------------------------------------------------------------->
    <?php elseif (strpos($_SERVER['PHP_SELF'], 'manager-dashboard.php') == TRUE): ?>
    <!-- Navigation Panel Buttons -->
    <nav class="navbar">
        <a href="./index.php">DASHBOARD</a>
    </nav>
    <!-- Login image -->
    <div class="login-button">
        <a class="openPopup">MANAGER</a>
        <a class="openPopup"><img src="./assets/images/site-img/login.png" alt="MANAGER"></a>
    </div>

    <!-- Designer Dashboard header panel --------------------------------------------------------------------------------------------->
    <?php elseif (strpos($_SERVER['PHP_SELF'], 'designer-dashboard.php') == TRUE): ?>
    <!-- Navigation Panel Buttons -->
    <nav class="navbar">
        <a href="./index.php">DASHBOARD</a>
        <a href="./src/views/gallery.php">GALLERY</a>
    </nav>
    <!-- Login image -->
    <div class="login-button">
        <a class="openPopup">DESIGNER</a>
        <a class="openPopup"><img src="./assets/images/site-img/login.png" alt="DESIGNER"></a>
    </div>

    <!-- Visitor and User Dashboard header panel ------------------------------------------------------------------------------------->
    <?php else: ?>
    <!-- Navigation Panel Buttons -->
    <nav class="navbar">
        <a href="./index.php">HOME</a>
        <a href="./src/views/gallery.php">GALLERY</a>
        <a href="./src/views/services.php">SERVICES</a>
        <a href="./src/views/about.php">ABOUT</a>
        <a href="./src/views/contact.php">CONTACT</a>
    </nav>
    <!-- Login image -->
    <div class="login-button">
        <a class="openPopup">SIGN IN</a>
        <a class="openPopup"><img src="./assets/images/site-img/login.png" alt="DESIGNER"></a>
    </div>
    <?php endif; ?>

    <!-- Search bar -->
    <div class="search-notify">
        <input type="text" placeholder="Search..">
        <a href="#"><img src="./assets/images/site-img/icons/search.png"></a>
        <a href="#"><img src="./assets/images/site-img/icons/notify-animate.gif"></a>
    </div>

</header>

<!-- Include log in popup -->
<?php
$currentPage = $_SERVER['PHP_SELF'];

if ((strpos($currentPage, 'sign-up.php') !== FALSE) OR (strpos ($currentPage, 'dashboard-admin.php') !== FALSE)) {
    include_once '../../components/sign-in/sign-in.php';
} elseif (strpos($currentPage, 'dashboard-admin.php') !== TRUE) {
    include_once '../components/sign-in/sign-in.php';
}
?>