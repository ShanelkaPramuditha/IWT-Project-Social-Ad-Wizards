<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatable" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="assets/css/faq.css">
    <title>Socail Ad Wizards</title>
</head>

<body>
    <!-- open Navigation bar with PHP -->
    <?php include 'header.php' ?>

    <section id="faq">
<div>

    <h1>FAQ</h1>

<div class="al">	

<!--form creation-->
<form method="POST" action="config.php" class="i">
    <br>
<center><h4>Question</h4> :
    <br><br>
<!--<input type ="text" name="name"  placeholder="  Ask your Question...." size="100" required></center>-->
<textarea cols="100" rows="3" placeholder="......................................Ask your Question................."></textarea>
<br>
<br>
<center><input type="submit" class ="button"value="SEND"></center>

    </div>

</form>
    </div>

</div>

<?php
require_once('connection.php');

// Connect to the database
/*$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ad";
$conn = new mysqli($servername, $username, $password, $dbname);
*/
// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Execute a query
$sql = "SELECT * FROM answer";
$result = $conn->query($sql);

// Generate HTML table
if ($result->num_rows > 0) {
    echo "<table border=1>";
    echo "<tr><th>Question</th>";
	echo "<th>Answer</th></tr>";

    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["summary"] . "</td>";
		echo "<td>" . $row["answer"] . "</td></tr>";
        
    }
    echo "</table>";
} else {
    echo "No data found.";
}

// Close the connection
$conn->close();
?>
    <!-- Footer bar with PHP -->
    <?php include 'footer.php' ?>
</body>
</html>
</section>