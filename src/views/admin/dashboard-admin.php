<?php
session_start();
if (!isset ($_SESSION['isLoggedIn']) || ($_SESSION['user_role'] !== 'admin')) {
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
    <title>Admin Dashboard</title>
    <!-- Page styles --> 
    <link rel="stylesheet" type="text/css" href="./src/css/dashboard-admin.css">
</head>

<body>
    <!-- open Navigation bar with PHP -->
    <?php include_once '../../components/header.php'; ?>

<a href="./src/views/admin/signup-staff.php">Add a New Staff Account</a>

<div class="table-container">
    <h1 class="center">Staff User Board</h1>
    <table class="data-table">
        <tr>
            <th>Profile Picture</th>
            <th>Name</th>
            <th>E-mail</th>
            <th>Role</th>
            <th></th>
        </tr>
        
        <?php
        include '../../config/database/connection.php';

        // SQL query to fetch data from the "users" table
        $sql = "SELECT s_user_id, first_name, last_name, email, user_role, profile_picture FROM registered_users WHERE user_role = 'manager' OR user_role = 'designer'";

        // Execute the query
        $result = $conn -> query($sql);

        // Check if any rows were returned
        if ($result -> num_rows > 0) {
            // Loop through the rows and display the data in the table
            while ($row = $result -> fetch_assoc()) {
                echo "<tr>";
                    echo '<td><img src="' . $row["profile_picture"] . '" width="50" height="50"></td>';
                    echo "<td>" . $row["first_name"] . " " . $row["last_name"] . "</td>";
                    echo "<td>" . $row["email"] . "</td>";
                    echo "<td>" . $row["user_role"] . "</td>";
                    echo '<td class="edit-btn"><a href="./src/views/admin/edit-user.php?s_user_id=' . $row['s_user_id'] . '">Edit</a></td>';
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='4'>No data found.</td></tr>";
        }

        // Close the connection
       // $conn -> close();
        ?>
        
    </table>
</div>

<div class="table-container">
    <h1 class="center">Registered User Board</h1>
    <a href=#>Export to excel</a>
    <table class="data-table">
        <tr>
            <th>Profile Picture</th>
            <th>Name</th>
            <th>E-mail</th>
            <th></th>
        </tr>

        <?php
        // SQL query to fetch data from the "users" table
        $sql = "SELECT s_user_id, first_name, last_name, email, user_role, profile_picture FROM registered_users WHERE user_role = 'user'";

        // Execute the query
        $result = $conn -> query($sql);

        // Check if any rows were returned
        if ($result -> num_rows > 0) {
            // Loop through the rows and display the data in the table
            while ($row = $result -> fetch_assoc()) {
                echo "<tr>";
                    echo '<td><img src="' . $row["profile_picture"] . '" width="50" height="50"></td>';
                    echo "<td>" . $row["first_name"] . " " . $row["last_name"] . "</td>";
                    echo "<td>" . $row["email"] . "</td>";
                    echo '<td class="edit-btn"><a href="./edit-user.php?s_user_id=' . $row["s_user_id"] . '">Edit</a></td>';
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='4'>No data found.</td></tr>";
        }

        // Close the connection
        $conn -> close();
        ?>

    </table>
</div>

    <!-- Footer with PHP -->
    <?php include_once '../../components/footer.php'; ?>
</body>
</html>
