<?php
session_start();
if (!isset($_SESSION['isLoggedIn']) || ($_SESSION['user_role'] !== 'manager')) {
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
    <title>Edit Order</title>
    <!-- Page styles -->
    <link rel="stylesheet" type="text/css" href="./src/css/edit-order.css">
</head>

<body>
    <!-- open Navigation bar with PHP -->
    <?php include_once '../../components/header.php'; ?>

    <?php
    // Include the database connection
    include '../../config/database/connection.php';

    // Check if the order_id parameter is set
    if (isset($_GET['order_id'])) {
        $order_id = $_GET['order_id'];

        // Retrieve the order data from the database
        $query = "SELECT * FROM order_info WHERE order_id = ?";
        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, "i", $order_id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        // Check if the order exists
        if (mysqli_num_rows($result) > 0) {
            // Fetch the order data
            $row = mysqli_fetch_assoc($result);
            // Retrieve the specific order information
            $s_user_id = $_SESSION['s_user_id'];
            $order_date = $row['order_date'];
            $order_status = $row['order_status'];
            $ad_platform = $row['ad_platform'];
            $order_desc = $row['order_desc'];
            $category = $row['category'];
            $ad_format = $row['ad_format'];

            // Display the edit form
            echo '
        <center><h1>Approve & Update Order</h1></center>
        <hr>
        <div class="order-container">
            <form action="./src/config/database/update/update-order.php" method="POST">
                <input type="hidden" name="s_user_id" value="' . $s_user_id . '">
                <input type="hidden" name="order_id" value="' . $order_id . '">
                <input type="hidden" name="order_date" value="' . $order_date . '">
                <input type="hidden" name="order_status" value="' . $order_status . '">
                <div class="row">
                    <label for="ad_platform">Platform</label>
                    <input type="text" name="ad_platform" value="' . $ad_platform . '">
                </div>

                <div class="row">
                    <label for="ad_format">Format</label>
                    <input type="text" name="ad_format" value="' . $ad_format . '">
                </div>

                <div class="row">
                    <label for="category">Category</label>
                    <input type="text" name="category" value="' . $category . '">
                </div>

                <div class="row">
                    <label for="order_desc">Order Description</label>
                    <textarea name="order_desc">' . $order_desc . '</textarea>
                </div>

                <br>

                <button type="submit">Update & Approve</button>
            </form>
            
            <!-- Delete Order button -->
            <form action="./src/config/database/delete/delete-order.php?order_id=' . $row['order_id'] . '" method="POST">
                <input type="hidden" name="order_id" value="' . $order_id . '">
                <button type="submit" class="delete-btn">Delete Order</button>
            </form>
        </div>
        ';
        } else {
            echo 'Order not found.';
        }
    } else {
        echo 'Invalid request.';
    }

    // Close the database connection
    mysqli_close($conn);
    ?>
    <!-- Footer with PHP -->
    <?php include_once '../../components/footer.php'; ?>

</body>
</html>
