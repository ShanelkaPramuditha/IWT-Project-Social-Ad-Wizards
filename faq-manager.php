<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="assets/css/faq-manager.css" >
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <title>FAQ Page</title>
</head>
<body>
    
<h1>Manager dashboard</h1>
    <?php include 'header.php' 
    ?>

<?php
require_once('connection.php');
// Connect to the database
/*$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ad";
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}*/

// Execute a query
$sql = "SELECT * FROM faq";
$result = $conn->query($sql);

// Generate HTML table
if ($result->num_rows > 0) {
    echo "<table border=1>";
    echo "<tr><th>Question</th></tr>";

    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["Question"] . "</td><td>";
    }
    echo "</table>";
} else {
    echo "No data found.";
}

// Close the connection
$conn->close();
?>

<button>Answer the question</button>
</body>
</html>