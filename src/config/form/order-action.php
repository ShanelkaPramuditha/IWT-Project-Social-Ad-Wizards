<?php
session_start();
if (!isset($_SESSION['isLoggedIn']) || ($_SESSION['user_role'] !== 'user')) {
    header('Location: ../home.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Import config file
    // require_once '../../config/config.php';
    // Import database connection
    require_once '../../config/database/connection.php';

    // Retrieve form data
    $sUserId = $_SESSION['s_user_id'];
    $adPlatform = $_POST['ad_platform'];
    $orderDesc = $_POST['order_desc'];
    $category = $_POST['category'];
    $adFormat = $_POST['ad_format'];

    if ($adFormat === 'video') {
        //create price variable
        $orderValue = floatval(5500.00);
    }
    elseif ($adFormat === 'picture') {
        //create price variable
        $orderValue = floatval(3000.00);
    }

    // check the offers
    $sql = "SELECT * FROM offer";
    $result = $conn -> query($sql);

    if ($result -> num_rows > 0) {
        while ($row = $result -> fetch_assoc()) {
            $offer = floatval($row['offer_percentage']);
            // calculate the order value
            $orderValue = $orderValue - (($orderValue) * $offer) / 100; 
        }
    }

    // Insert the data into the database
    $sql = "INSERT INTO order_info (s_user_id, ad_platform, order_desc, category, ad_format, order_value)
            VALUES ('$sUserId', '$adPlatform', '$orderDesc', '$category', '$adFormat', $orderValue)";

    // Execute the statement
    if ($conn -> query($sql) === TRUE) {
        $oMessage = 'Order placed successfully.';
    } else {
        $oMessage = 'Error placing order: ' . $conn -> error;
    }

    // Close the statement and the database connection
    $conn -> close();

    // Import config file
    require_once '../config.php';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <base href="<?php echo BASE_URL; ?>">
    <link rel="stylesheet" href="./src/css/alert-box.css">
</head>
<body>
    <!-- displaying message in a pop-up -->
    <?php
    echo "<script>
        var oMessage = '$oMessage';
    </script>";
    if (isset($oMessage)) : ?>
        <script src="./src/js/alert-box.js"></script>
    <?php endif; ?>
</body>
</html>