<?php
session_start();
if (!isset ($_SESSION['isLoggedIn']) || ($_SESSION['user_role'] !== 'designer')) {
    header('Location: ../home.php');
    exit;
}
?>

<!-- Import config file -->
<?php
require_once '../../config/config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <base href="<?php echo BASE_URL; ?>">
    <link rel="icon" href="./assets/images/site-img/favicon/favicon.ico">
    <title>Manage Gallery</title>
    <!-- Page styles --> 
    <link rel="stylesheet" type="text/css" href="./src/css/dashboard-admin.css">
</head>

<body>
   <!-- open Navigation bar with PHP -->
   <?php include_once '../../components/header.php'; ?>
<form action="add-photo.php" method="POST" enctype="multipart/form-data">
   <input type="file" name="gallery-item">
   <button type="submit">Add New Photo</button>
</form>

   <!-- Footer with PHP -->
   <?php include_once '../../components/footer.php'; ?>
</body>
</html>
