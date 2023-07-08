<?php
session_start();
if (!isset($_SESSION['isLoggedIn']) || ($_SESSION['user_role'] !== 'manager')) {
    header('Location: ../home.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Include the database connection
    require_once '../../../config/database/connection.php';

    // Retrieve offer ID and updated offer data from the form
    $offer_id = $_POST['offer_id'];
    $offer_percentage = $_POST['offer_percentage'];
    // $o_end_date = $_POST['o_end_date'];

    // Update the offer in the database
    $query = "UPDATE offer SET offer_percentage = '$offer_percentage' WHERE offer_id = '$offer_id'";
    $result = $conn->query($query);

    if ($result) {
        // Offer updated successfully
        header('Location: ../../../views/manager/offer-manage.php');
    } else {
        // Failed to update offer
        echo "<center>Failed to update offer. Please try again.</center>";
    }

    // Close the database connection
    $conn->close();
} else {
    // Redirect to home page if accessed directly without a POST request
    header('Location: ../../pages/home.php');
    exit;
}
?>