<?php

// Retrieve form data
$name = $_POST['name'];

require_once('connection.php');

/*
// Database connection
$servername = "localhost"; 
$username = "root";     
$password = "";     
$dbname = "ad";       

// Create a connection
$conn = new mysqli("localhost", "root", "", "ad");

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}*/

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