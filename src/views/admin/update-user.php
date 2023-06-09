<?php
// Import config file
require_once '../../config/config.php';
include '../../config/database/connection.php';
// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the form data
    $userId = $_POST['id'];
    $firstName = $_POST['first_name'];
    $lastName = $_POST['last_name'];
    $email = $_POST['email'];
    $userRole = $_POST['user_role'];

    // Update the user data in the database
    // Modify the query and database connection details as per your database structure
    $sql = "UPDATE registered_users SET first_name = ?, last_name = ?, email = ?, user_role = ? WHERE s_user_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssi", $firstName, $lastName, $email, $userRole, $userId);
    $stmt->execute();

    // Check if the update was successful
   if ($stmt->affected_rows > 0) {
      header ("Location: ./dashboard-admin.php");
   } else {
        echo "Failed to update user data.";
   }

    // Close the prepared statement and the database connection
    $stmt->close();
    $conn->close();
} else {
    echo "Invalid request.";
}
?>
