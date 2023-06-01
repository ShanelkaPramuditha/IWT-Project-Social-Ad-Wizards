<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="assets/css/dashboard-admin.css">
    <title>Admin Dashboard</title>
</head>

<body>
    <!-- Navigation panel with PHP -->


<div>
    <h1>Admin Dashboard</h1>
</div>

<a href="signup-staff.php">Add a New Staff Account</a>

<div class="container">
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
        include 'connection.php';

        // SQL query to fetch data from the "users" table
        $sql = "SELECT first_name, last_name, email, user_role, profile_picture FROM registered_users WHERE user_role = 'manager' OR user_role = 'designer'";

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
                    echo '<td class="cell-button"><button>Edit</button></td>';
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

<div class="container">
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
        $sql = "SELECT first_name, last_name, email, user_role, profile_picture FROM registered_users WHERE user_role = 'user'";

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
                    echo '<td class="cell-button"><button>Edit</button></td>';
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
<?php include 'footer.php' ?>
</body>
</html>
