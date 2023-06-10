<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['isLoggedIn'])) {
    // Redirect to the login page or show an appropriate message
    header('Location: ../../../views/login.php');
    exit;
}

// Include the database connection
include '../connection.php';

// Get the logged-in user's ID
$s_user_id = $_SESSION['s_user_id'];

// Delete the user account and profile
$query = "DELETE FROM registered_users WHERE s_user_id = ?";
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, "i", $s_user_id);
mysqli_stmt_execute($stmt);

// Check if the account and profile were deleted successfully
if (mysqli_affected_rows($conn) > 0) {
    // Logout the user and redirect to the login page or show a success message
    session_destroy();
    header('Location: login.php');
    exit;
} else {
    // Show an error message if the account and profile deletion failed
    echo 'Failed to delete the account.';
}

// Close the database connection
mysqli_close($conn);
?>
