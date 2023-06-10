<!-- Import config file -->
<?php
require_once '../config/config.php';

session_start();
if (!isset ($_SESSION['isLoggedIn']) || ($_SESSION['user_role'] !== 'user')) {
    header('Location: ../views/home.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <base href="<?php echo BASE_URL; ?>">
    <link rel="icon" href="./assets/images/site-img/favicon/favicon.ico">
    <title>Search Results</title>
    <!-- Page styles --> 
    <link rel="stylesheet" type="text/css" href="./src/css/search.css">
</head>

<body>
    <!-- Open Navigation bar with PHP -->
    <?php include_once '../components/header.php'; ?>

    <form action="./src/config/form/order-action.php" method="POST">

  <label for="order_date">Order Date:</label>
  <input type="date" name="order_date" id="order_date" required>

  <label for="order_status">Order Status:</label>
  <input type="text" name="order_status" id="order_status" required>

  <label for="ad_platform">Ad Platform:</label>
  <input type="text" name="ad_platform" id="ad_platform" required>

  <label for="order_desc">Order Description:</label>
  <textarea name="order_desc" id="order_desc" rows="4" required></textarea>

  <label for="category">Category:</label>
  <input type="text" name="category" id="category">

  <label for="ad_format">Ad Format:</label>
  <input type="text" name="ad_format" id="ad_format" required>

  <button type="submit">Submit</button>
</form>

    <!-- Footer with PHP -->
    <?php include_once '../components/footer.php'; ?>
    
</body>
</html>