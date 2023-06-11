<?php

// Retrieve form data
$que=$_POST['que'];
$ans=$_POST['ans'];

require_once('connection.php');

// Database connection
/*$servername = "localhost"; 
$username = "root";     
$password = "";     
$dbname = "social_ad_wizards";       

// Create a connection
$conn = new mysqli("localhost", "root", "", "social_ad_wizards");
*/
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Insert data into the database
$sql = "INSERT INTO answer(summery,answer) VALUES ('$que','$ans')";

if ($conn->query($sql) === TRUE) {
  echo "Answers provide successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the connection
$conn->close();
?>