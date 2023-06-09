<?php
// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $offer_percentage = $_POST['offer_percentage'];
    $o_end_date = $_POST['o_end_date'];

    // Validate and sanitize the form data as needed

    // Include the database connection
    require_once '../../config/database/connection.php';

    // Insert data into the database
    $sql = "INSERT INTO offer (offer_percentage, o_start_date, o_end_date) 
            VALUES ('$offer_percentage', DEFAULT, '$o_end_date')";

    if ($conn->query($sql) === TRUE) {
        header ('Location: ../../views/manager/offer-manage.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
?>