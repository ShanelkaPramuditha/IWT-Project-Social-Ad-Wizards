<?php
session_start();
if (!isset($_SESSION['isLoggedIn']) || ($_SESSION['user_role'] !== 'user')) {
    header('Location: ../home.php');
    exit;
}
?>

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
    <title>Place Order</title>
    <!-- Page styles -->
    <link rel="stylesheet" type="text/css" href="./src/css/order.css">
    <style>
    .order-table {
        width: 100%;
        border-collapse: collapse;
    }

    .order-table th,
    .order-table td {
        padding: 8px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    .order-table th {
        background-color: #f2f2f2;
    }
</style>
</head>

<body>
<!-- open Navigation bar with PHP -->
<?php include_once '../components/header.php'; ?>

<div class="container">
    <?php
    include_once '../config/database/connection.php';

    // Retrieve data from the order_info table
    $query = "SELECT * FROM order_info WHERE s_user_id = " . $_SESSION['s_user_id'];

    $result = mysqli_query($conn, $query);

    echo '<hr><center><h1>My Orders</h1></center>';

    // Check if any orders are found
    if (mysqli_num_rows($result) > 0) {
        // Display the order data
        echo '<table class="order-table">';
        echo '<tr>';
        echo '<th>Order ID</th>';
        echo '<th>Order Date</th>';
        echo '<th>Order Status</th>';
        echo '<th>Ad Platform</th>';
        echo '<th>Order Description</th>';
        echo '<th>Category</th>';
        echo '<th>Order Link</th>';
        echo '</tr>';

        while ($row = mysqli_fetch_assoc($result)) {
            echo '<tr>';
            echo '<td>' . $row['order_id'] . '</td>';
            echo '<td>' . $row['order_date'] . '</td>';
            echo '<td>' . $row['order_status'] . '</td>';
            echo '<td>' . $row['ad_platform'] . '</td>';
            echo '<td>' . $row['order_desc'] . '</td>';
            echo '<td>' . $row['category'] . '</td>';
            if ($row['order_status'] === 'Completed') {
                echo '<td><a href="' . $row['released_link'] . '">Download</a></td>';
            }
            echo '</tr>';
        }

        echo '</table>';
    } else {
        // No orders found
        echo 'No orders found.';
    }

    // Close the database connection
    mysqli_close($conn);
    ?>
</div>
    <!-- Footer with PHP -->
    <?php include_once '../components/footer.php'; ?>
</body>
</html>
