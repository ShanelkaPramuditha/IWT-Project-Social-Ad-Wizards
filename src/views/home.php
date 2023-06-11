<!-- Import config file -->
<?php
require_once '../config/config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <base href="<?php echo BASE_URL; ?>">
    <link rel="icon" href="./assets/images/site-img/favicon/favicon.ico">
    <title>Social Ad Wizards</title>
    <!-- Page styles --> 
    <link rel="stylesheet" type="text/css" href="./src/css/home.css">
</head>

<body>
    <!-- open Navigation bar with PHP -->
    <?php include_once '../components/header.php'; ?>

    <section id="home">
        <div class="main-container">
            <div class="left">
                <h1>Prepare Your Best Advertisement</h1>
                <p>Unlock the potential of your brand with our social advertising platform. Our cutting-edge tools and strategies ensure that your business reaches its target audience effectively, maximizing conversions. Discover the power of Your Best Advertisement today.</p>
                <?php
                // Check if the user is logged in
                // Start the session if it has not been started
                if (session_status() == PHP_SESSION_NONE) {
                    session_start();
                }
                if (isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn']) {
                    // User is logged in
                    echo '<a href="./src/views/order.php"><button class="hire-us-btn">PLACE ORDER...</button></a>';
                    echo '<a href="./src/views/my-orders.php"><button class="hire-us-btn">MY ORDERS</button></a>';
                } else {
                    // User is not logged in
                    echo '<button class="hire-us-btn openPopup">PLACE ORDER...</button>';
                }
                ?>

            </div>
            <div id="img-slider">
                <?php include_once '../components/image-slider/image-slider.php'; ?>
            </div>
        </div>
        <!-- 
        <?php
        // Start the session if it has not been started
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if (isset($_SESSION['isLoggedIn']) && ($_SESSION['isLoggedIn'] === true) && ($_SESSION['user_role'] === 'user')) {
            echo "<h1>Welcome, logged-in user!</h1>";
        }
        ?> -->

    </section>

    <hr>

    <section id="gallery">
        <?php require_once './gallery.php'; ?>
    </section>

    <hr>

    <section id="services">
        <?php require_once './services.php'; ?>
    </section>

    <hr>

    <section id="about">
        <?php require_once './about.php'; ?>
    </section>

    <hr>
    
    <section id="contact">
        <?php require_once './contact.php'; ?>
    </section>

    <?php include_once '../components/footer.php'; ?>
</body>
</html>

<script>
    // Open the sign-in pop-up
var openPopupButtons = document.getElementsByClassName("openPopup");
for (var i = 0; i < openPopupButtons.length; i++) {
  openPopupButtons[i].addEventListener("click", function() {
    document.getElementById("popupOverlay").style.display = "block";
    document.getElementById("popupContainer").style.display = "block";
  });
}

// Close the sign-in pop-up
document.getElementById("popupOverlay").addEventListener("click", function() {
  document.getElementById("popupOverlay").style.display = "none";
  document.getElementById("popupContainer").style.display = "none";
});
</script>