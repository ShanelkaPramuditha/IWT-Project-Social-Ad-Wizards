<?php
// Retrieve form data
$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];

require_once('../database/connection.php');

// Insert form data into the table
$sql = "INSERT INTO contact_messages (name, email, subject) VALUES ('$name', '$email', '$subject')";

if ($conn->query($sql) === TRUE) {
    echo "Message sent successfully!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
