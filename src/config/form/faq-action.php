<?php

// Retrieve form data
$name = $_POST['name'];

require_once('../database/connection.php');

// Insert data into the database
$sql = "INSERT INTO faq(Question) VALUES ('$name')";

if ($conn->query($sql) === TRUE) {
  echo "Data inserted successfully";
  
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the connection
$conn->close();
?>