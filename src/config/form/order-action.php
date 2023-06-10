<?php
// Include the database connection
include '../../config/database/connection.php';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the form data
    $s_user_id = 1;
    $order_date = $_POST['order_date'];
    $order_status = $_POST['order_status'];
    $ad_platform = $_POST['ad_platform'];
    $order_desc = $_POST['order_desc'];
    $category = $_POST['category'];
    $ad_format = $_POST['ad_format'];

    // Prepare the INSERT statement
    $query = "INSERT INTO order_info (s_user_id, order_date, order_status, ad_platform, order_desc, category, ad_format)
              VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $query);

    // Check if the prepared statement is successful
    if ($stmt) {
        // Bind the parameters with the form data
        mysqli_stmt_bind_param($stmt, "issssss", $s_user_id, $order_date, $order_status, $ad_platform, $order_desc, $category, $ad_format);

        // Execute the statement
        if (mysqli_stmt_execute($stmt)) {
            header ('Location: ../../../index.php?');
        } else {
            echo "Error executing the statement: " . mysqli_error($conn);
        }

        // Close the statement
        mysqli_stmt_close($stmt);
    } else {
        echo "Error preparing the statement: " . mysqli_error($conn);
    }
}

// Close the database connection
mysqli_close($conn);
?>
