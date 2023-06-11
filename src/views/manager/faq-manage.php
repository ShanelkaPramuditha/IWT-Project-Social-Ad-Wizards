<?php
session_start();
if (!isset ($_SESSION['isLoggedIn']) || ($_SESSION['user_role'] !== 'manager')) {
    header('Location: ../home.php');
    exit;
}
?>

<!-- Import config file -->
<?php
require_once '../../config/config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <base href="<?php echo BASE_URL; ?>">
    <link rel="icon" href="./assets/images/site-img/favicon/favicon.ico">
    <title>Manage FAQ</title>
    <!-- Page styles --> 
    <link rel="stylesheet" type="text/css" href="./src/css/faq-manage.css">
</head>

<body>
    <center><h1>Manage FAQ</h1></center>
    <!-- open Navigation bar with PHP -->
    <?php include_once '../../components/header.php'; ?>
<!-- open Navigation bar with PHP -->
  <?php

include_once '../../config/database/connection.php';

// Execute a query
$sql = "SELECT faq.*, registered_users.first_name FROM faq INNER JOIN registered_users ON faq.s_user_id = registered_users.s_user_id";
$result = $conn->query($sql);

// Generate HTML table
if ($result->num_rows > 0) {
    echo "<table border=1>";
    echo "<tr><th>Name</th><th>Question</th>";
    echo "<th>Answer</th>";
    echo "<th>Buttons</th></tr>";
    

    while($row = $result->fetch_assoc()) {

        echo '
            <tr>
            <td>' . $row["first_name"] . '</td>
            <td>' . $row["question"] . '</td>
            <td>' . $row["answer"] . '</td>
            <td><a class="edit-button" href="./src/views/manager/edit-faq.php?faq_id=' . $row['faq_id'] . '">Edit</a></td>

            </tr>';
        
    }
    echo "</table>";
} else {
    echo "No data found.";
}

?>

<section id="contact">
    <?php include ('./contact-messages.php'); ?>
</section>

    <!-- Footer with PHP -->
    <?php include_once '../../components/footer.php'; ?>
    
</body>
</html>
