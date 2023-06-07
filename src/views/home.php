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
    <!-- Import Style Sheets -->
    <!-- <link rel="stylesheet" href=""> -->
    <!-- Page styles --> 
    <link rel="stylesheet" type="text/css" href="./src/css/home.css">
</head>

<body>
    <!-- open Navigation bar with PHP -->
    <?php include_once '../components/header.php'; ?>

    <section id="home">
        <div>
            <h1>Index in PHP</h1>
        </div>
        <?php
session_start();
if (isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn'] === true && $_SESSION['user_role'] === 'user') {
    echo "<h1>Welcome, logged-in user!</h1>";
}
?>

        
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