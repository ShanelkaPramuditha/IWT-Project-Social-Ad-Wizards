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
//require_once('connection.php');
// Connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ad";
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Execute a query
$sql = "SELECT * FROM faq";
$result = $conn->query($sql);

// Generate HTML table
if ($result->num_rows > 0) {
    echo "<table border=1>";
    echo "<tr><th>Question</th>";
    

    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["Question"] . "</td><td>";
        echo '<td><a href="delete.php">Delete</a></td>';
        echo '<td><a href="answer.php">Answer</a></td>';
        
    }
    echo "</table>";
} else {
    echo "No data found.";
}

// Close the connection
$conn->close();
?>


/*
<!-- Import config file -->
<?php
require_once '../config/config.php';
?>

<!DOCTYPE html>
<html lang="en">
<!-- <style 
    </style> -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <base href="<?php echo BASE_URL; ?>">
    <!-- Import Style Sheets -->
    <link rel="stylesheet" type="text/css" href="././src/css/header.css">
    <link rel="stylesheet" type="text/css" href="././src/css/footer.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Page styles --> 
    <link rel="stylesheet" type="text/css" href="./src/css/faq.css">
    <title>FAQ</title>
</head>

<body>
    <!-- open Navigation bar with PHP -->
    <?php include_once '../../header.php' ?>

<div>

<h1>test</h1></br>
<h1>test</h1></br>
    <h1>FAQ</h1>

<div class="al">	

<!--form creation-->
<form method="POST" action="config.php" class="i">
<center>Question :
<input type ="text" name="name"  placeholder="  Ask your Question...." size="100"></center>
<br>
<br>
<center><input type="submit" class ="button"value="SEND"></center>


</form>
    </div>
</div>
    <!-- Footer bar with PHP -->
    <?php include_once '../components/footer.php' ?>
  */
</body>
</html>