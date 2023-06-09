<?php
// Include the database connection
require_once '../connection.php';

// Check if the offer ID is provided in the URL
if (isset($_GET['id'])) {
    $offer_id = $_GET['id'];

    // Delete the offer from the database
    $sql = "DELETE FROM offer WHERE offer_id = '$offer_id'";
    if ($conn->query($sql) === TRUE) {
        // Redirect to the offer management page
        header("Location: ../../../views/manager/offer-manage.php");
        exit;
    } else {
        echo "Error deleting offer: " . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>
