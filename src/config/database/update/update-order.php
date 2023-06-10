<?php
// Include the database connection
include '../connection.php';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the order_id from the form
    $order_id = $_POST['order_id'];

    // Retrieve the updated order information from the form
    $s_user_id = $_POST['s_user_id'];
    $order_date = $_POST['order_date'];
    $order_status = $_POST['order_status'];
    $ad_platform = $_POST['ad_platform'];
    $order_desc = $_POST['order_desc'];
    $category = $_POST['category'];
    $ad_format = $_POST['ad_format'];

    // Update the order in the database
    $query = "UPDATE order_info SET s_user_id=?, order_date=?, order_status=?, ad_platform=?, order_desc=?, category=?, ad_format=? WHERE order_id=?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "issssssi", $s_user_id, $order_date, $order_status, $ad_platform, $order_desc, $category, $ad_format, $order_id);
    $result = mysqli_stmt_execute($stmt);

    // Check if the update was successful
    if ($result) {
        echo 'Order updated successfully.';
    } else {
        echo 'Error updating order.';
    }
} else {
    echo 'Invalid request.';
}

// Close the database connection
mysqli_close($conn);
?>