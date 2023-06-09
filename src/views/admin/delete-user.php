<?php
session_start();
if (!isset($_SESSION['isLoggedIn']) || ($_SESSION['user_role'] !== 'admin')) {
    header('Location: ../home.php');
    exit;
}

require_once '../../config/config.php';
include '../../config/database/connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['id'])) {
        $userId = $_POST['id'];

        // Prepare and execute the DELETE query
        $sql = "DELETE FROM registered_users WHERE s_user_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $userId);
        if ($stmt->execute()) {
            // User account deleted successfully
            header('Location: dashboard-admin.php'); // Redirect to the user list page or any other desired location
            exit;
        } else {
            // Error occurred while deleting the user account
            echo "Error deleting user account.";
        }

        $stmt->close();
    } else {
        echo "Invalid request.";
    }
} else {
    echo "Invalid request.";
}

$conn->close();
?>
