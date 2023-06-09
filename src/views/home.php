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
                <h1>Your Best Advertisement</h1>
                <p>Unlock the potential of your brand with our social advertising platform. Our cutting-edge tools and strategies ensure that your business reaches its target audience effectively, maximizing conversions. Discover the power of Your Best Advertisement today.</p>
                <a href="./src/views/place-order.php" class="hire-us-btn">HIRE US...</a>

            </div>
            <div id="img-slider">
                <?php include_once '../components/image-slider/image-slider.php'; ?>
            </div>
        </div>
        <!-- 
        <?php
        session_start();
        if (isset($_SESSION['isLoggedIn']) && ($_SESSION['isLoggedIn'] === true) && ($_SESSION['user_role'] === 'user')) {
            echo "<h1>Welcome, logged-in user!</h1>";
        }
        ?> -->

        
        <h1>test</h1></br>
        <h1>test</h1></br>
        <h1>test</h1></br>
        <h1>test</h1></br>
        <h1>test</h1></br>
        <h1>test</h1></br>
        <h1>test</h1></br>
        <h1>test</h1></br>
        <h1>test</h1></br>
        <h1>test</h1></br>
        <h1>test</h1></br>
        <h1>test</h1></br>
        <h1>test</h1></br>
        <h1>test</h1></br>
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