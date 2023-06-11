<?php
session_start();
// Retrieve form data
$question = $_POST['question'];
$userId = $_SESSION['s_user_id'];

require_once('../database/connection.php');

// Insert data into the database
$sql = "INSERT INTO faq(s_user_id, question) VALUES ('$userId', '$question')";

if ($conn->query($sql) === TRUE) {
  header ('Location: ../../views/faq.php');
  
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the connection
$conn->close();
?>