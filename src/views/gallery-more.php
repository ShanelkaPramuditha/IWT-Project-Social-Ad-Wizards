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
    <title>Gallery</title>
    <!-- Page styles --> 
    <link rel="stylesheet" type="text/css" href="./src/css/home.css">
</head>

<body>
    <!-- open Navigation bar with PHP -->
    <?php include_once '../components/header.php'; ?>

        <!-- 
        <?php
        session_start();
        if (isset($_SESSION['isLoggedIn']) && ($_SESSION['isLoggedIn'] === true) && ($_SESSION['user_role'] === 'user')) {
            echo "<h1>Welcome, logged-in user!</h1>";
        }
        ?> -->

    <div>
        <a href="./src/views/designer/add.php">Add More</a>
    </div>


    <section id="gallery">
        <?php require_once './gallery.php'; ?>
    </section>

    <?php include_once '../components/footer.php'; ?>
</body>
</html>