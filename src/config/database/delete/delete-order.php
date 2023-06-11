<?php
// Check if the order_id parameter is set
if (isset($_GET['order_id'])) {
    $order_id = $_GET['order_id'];

    // Connect to the database
    include '../../../config/database/connection.php';

    // Delete the order from the database
    $query = "DELETE FROM order_info WHERE order_id = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "i", $order_id);
    mysqli_stmt_execute($stmt);

    // Check if the order was successfully deleted
    if (mysqli_stmt_affected_rows($stmt) > 0) {
        header('Location: ../../../views/manager/dashboard-manager.php');
        exit;
    } else {
        echo 'Failed to delete the order.';
    }

    // Close the database connection
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
} else {
    echo 'Invalid request.';
}
?>
