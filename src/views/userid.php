<?php
session_start();

if (isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn'] === true) {
    $userId = $_SESSION['s_user_id'];

    // Use the $userId variable as needed
    echo "Logged-in user ID: " . $userId;
} else {
    // User is not logged in, handle the case accordingly
    echo "User is not logged in.";
}

?>