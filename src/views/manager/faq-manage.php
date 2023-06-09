  <!-- open Navigation bar with PHP -->
  <?php

include_once '../config/database/connection.php';

// Execute a query
$sql = "SELECT * FROM faq";
$result = $conn->query($sql);

// Generate HTML table
if ($result->num_rows > 0) {
    echo "<table border=1>";
    echo "<tr><th>Question</th>";
    

    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["question"] . "</td><td>";
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