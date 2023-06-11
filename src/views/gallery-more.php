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
    <?php include_once '../components/header.php';
    // allow edit button for designers
        if (($isLoggedIn) && ($userRole === 'designer')) {
            echo '<div>
                <a href="./src/views/designer/add.php">Add More</a>
            </div>';
        }

        ?>
    <section id="gallery">
        <?php require_once './gallery.php'; ?>
    </section>

    <?php include_once '../components/footer.php'; ?>
</body>
</html>