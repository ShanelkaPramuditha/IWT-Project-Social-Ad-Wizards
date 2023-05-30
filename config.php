<?php

// Retrieve form data
$name = $_POST['name'];

// Database connection
$servername = "localhost";  // Replace with your database server name
$username = "root";     // Replace with your database username
$password = "";     // Replace with your database password
$dbname = "ad";       // Replace with your database name

// Create a connection
$conn = new mysqli("localhost", "root", "", "ad");

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

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