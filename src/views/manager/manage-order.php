<?php
// Include the database connection
include '../../config/database/connection.php';

// Retrieve data from the order_info table
$query = "SELECT * FROM order_info";
$result = mysqli_query($conn, $query);

// Check if any orders are found
if (mysqli_num_rows($result) > 0) {
    // Output the order data
    echo '<table>';
    echo '<tr>';
    echo '<th>Order ID</th>';
    echo '<th>User ID</th>';
    echo '<th>Order Date</th>';
    echo '<th>Order Status</th>';
    echo '<th>Ad Platform</th>';
    echo '<th>Order Description</th>';
    echo '<th>Category</th>';
    echo '<th>Ad Format</th>';
    echo '</tr>';

    while ($row = mysqli_fetch_assoc($result)) {
        echo '<tr>';
        echo '<td>' . $row['order_id'] . '</td>';
        echo '<td>' . $row['s_user_id'] . '</td>';
        echo '<td>' . $row['order_date'] . '</td>';
        echo '<td>' . $row['order_status'] . '</td>';
        echo '<td>' . $row['ad_platform'] . '</td>';
        echo '<td>' . $row['order_desc'] . '</td>';
        echo '<td>' . $row['category'] . '</td>';
        echo '<td>' . $row['ad_format'] . '</td>';
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