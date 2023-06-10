<?php
// Start the session if it has not been started
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
// get the currently executing file name
$currentPage = basename($_SERVER['PHP_SELF']);
// login status
$isLoggedIn = $_SESSION['isLoggedIn'] ?? FALSE;
// get the currently logged in user role
$userRole = $_SESSION['user_role'] ?? 'visitor';
?>

<!-- Header Navigation Panel -->
<header class="header-container">
    <!-- Web Site Name and Logo Image -->
    <div class="header-name">Social Ad Wizards</div>
    <img src="./assets/images/site-img/logo/logo.svg" alt="LOGO" class="header-logo">

    <!-- Log In and Log Out Buttons -->
    <?php if ($isLoggedIn): ?>
        <div class="login-button">
            <a class="logOut" href="./src/config/log-out.php">LOG OUT</a>
            <a class="editProfile" href="./src/views/profile.php"><img src="./assets/images/site-img/login.png" alt="ADMIN"></a>
        </div>
    <?php else: ?>
        <div class="login-button">
            <a class="openPopup">SIGN IN</a>
            <a class="openPopup"><img src="./assets/images/site-img/login.png" alt="ADMIN"></a>
        </div>
    <?php endif; ?>

        <!-- Admin dashboard header panel ------------------------------------------------------------------------------------------------>
        <?php if ($userRole == 'admin'): ?>
        <div>
            <h2 class="subheader-name">ADMIN DASHBOARD</h2>
        </div>
        <!-- Navigation Panel Buttons -->
        <nav class="navbar">
            <a href="./src/views/admin/dashboard-admin.php">DASHBOARD</a>
        </nav>

        <!-- Manager Dashboard header panel ---------------------------------------------------------------------------------------------->
        <?php elseif ($userRole == 'manager'): ?>
        <div>
            <h2 class="subheader-name">MANAGER DASHBOARD</h2>
        </div>
        <!-- Navigation Panel Buttons -->
        <nav class="navbar">
            <a href="./src/views/manager/dashboard-manager.php">DASHBOARD</a>
            <a href="./src/views/manager/offer-manage.php">OFFER</a>
            <a href="./src/views/manager/faq-manage.php">FAQ</a>
        </nav>
        <!-- Login image -->
        <!-- <div class="login-button">
            <a class="openPopupp" href="./src/config/log-out.php">LOG OUT - MANAGER</a>
            <a class="openPopup"><img src="./assets/images/site-img/login.png" alt="MANAGER"></a>
        </div> -->

        <!-- Designer Dashboard header panel --------------------------------------------------------------------------------------------->
        <?php elseif ($userRole == 'designer'): ?>
        <div>
            <h2 class="subheader-name">DESIGNER DASHBOARD</h2>
        </div>
        <!-- Navigation Panel Buttons -->
        <nav class="navbar">
            <a href="./src/views/designer/dashboard-designer.php">DASHBOARD</a>
            <a href="./src/views/designer/manage-gallery.php">GALLERY</a>
        </nav>
        <!-- Login image -->
        <!-- <div class="login-button">
            <a class="openPopupp" href="./src/config/log-out.php">LOG OUT - DESIGNER</a>
            <a class="openPopup"><img src="./assets/images/site-img/login.png" alt="DESIGNER"></a>
        </div> -->

        <!-- Visitor and User Dashboard header panel ------------------------------------------------------------------------------------->
        <?php else: ?>
        <!-- Navigation Panel Buttons -->
            <?php
            if ($currentPage == 'home.php'): ?>
                <nav class="navbar">
                    <a href="#" onclick="scrollToSection(event, 'home')">HOME</a>
                    <a href="#" onclick="scrollToSection(event, 'gallery')">GALLERY</a>
                    <a href="#" onclick="scrollToSection(event, 'services')">SERVICES</a>
                    <a href="#" onclick="scrollToSection(event, 'about')">ABOUT</a>
                    <a href="#" onclick="scrollToSection(event, 'contact')">CONTACT</a>
                </nav>
            <?php
            else: ?>
                <nav class="navbar">
                    <a href="./index.php#home">HOME</a>
                    <a href="./index.php#gallery">GALLERY</a>
                    <a href="./index.php#services">SERVICES</a>
                    <a href="./index.php#about">ABOUT</a>
                    <a href="./index.php#contact">CONTACT</a>
                </nav>
            <?php endif; ?>

        <!-- Login image -->
        <!-- <div class="login-button">
            <a class="openPopup">SIGN IN</a>
            <a class="openPopup"><img src="./assets/images/site-img/login.png" alt="DESIGNER"></a>
        </div> -->
        <?php endif; ?>

    <!-- Search bar -->
    <div class="search-notify">
        <form method="GET" action="./src/views/search.php">
            <input type="text" name="search" placeholder="Search..">
            <button type="submit" class="image-submit-button">
                <img src="./assets/images/site-img/icons/search.png" alt="Search">
            </button>

        </form>
        </form>
        <!-- <a href="#"><img src="./assets/images/site-img/icons/notify-animate.gif"></a> -->
    </div>

</header>

<!-- Getting the page file name -->
<?php
// $currentPage = $_SERVER['PHP_SELF'];

// page list of different path needed
$pageNames = ['home.php'];
//[
//     'dashboard-admin.php',
//     'signup-staff.php',
//     'dashboard-designer.php',
//     'dashboard-manager.php',
//     'faq-manage.php',
//     'offer-manage.php',
//     'edit-order.php'];

// check the match status
$matchStatus = FALSE;

foreach ($pageNames as $pageName) {
    if (strpos ($currentPage, $pageName) !== FALSE) {
        include_once '../components/sign-in/sign-in.php';
        $matchStatus = TRUE;
        break;
    }
}

// if not in the list
// if (!$matchStatus) {
//     include_once '../components/sign-in/sign-in.php';
// }
?>

<script src="./src/js/functions.js"></script>