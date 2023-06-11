<?php
$sql = "SELECT * FROM contact_messages";
$result = $conn->query($sql);
?>


<center><h2>Contact Messages</h2></center>
<table>
   <tr>
      <th>ID</th>
      <th>Name</th>
      <th>Email</th>
      <th>Subject</th>
      <th>Created Date and Time</th>
   </tr>

   <?php
   if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>".$row['id']."</td>";
            echo "<td>".$row['name']."</td>";
            echo "<td>".$row['email']."</td>";
            echo "<td>".$row['subject']."</td>";
            echo "<td>".$row['created_at']."</td>";
            echo "</tr>";
      }
   } else {
      echo "<tr><td colspan='5'>No contact messages found</td></tr>";
   }
   ?>
   
</table>


<?php
// Close the database connection
$conn->close();
?>