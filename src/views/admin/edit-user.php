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
include '../../config/database/connection.php';
?>


<?php
// Check if the ID parameter is provided in the URL
if (isset($_GET['s_user_id'])) {
    // Get the user ID from the URL
    $userId = $_GET['s_user_id'];

    // Retrieve the user data based on the ID from the database
    // Modify the query and database connection details as per your database structure
    $sql = "SELECT * FROM registered_users WHERE s_user_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $userId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        // Fetch the user data
        $user = $result->fetch_assoc();

        // Display the edit form with pre-filled user information
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Edit User Data</title>
        </head>
        <body>
            <h1>Edit User Data</h1>
            <form action="update-user.php" method="POST">
                <input type="hidden" name="id" value="<?php echo $user['s_user_id']; ?>">
                <label for="first_name">First Name:</label>
                <input type="text" name="first_name" value="<?php echo $user['first_name']; ?>">
                <label for="last_name">Last Name:</label>
                <input type="text" name="last_name" value="<?php echo $user['last_name']; ?>">
                <label for="email">Email:</label>
                <input type="email" name="email" value="<?php echo $user['email']; ?>">
                <label for="user_role">User Role:</label>
                <input type="text" name="user_role" value="<?php echo $user['user_role']; ?>">
                <button type="submit">Update</button>
            </form>

            <form action="delete-user.php" method="POST" onsubmit="return confirm('Are you sure you want to delete this user account?');">
                <input type="hidden" name="id" value="<?php echo $user['s_user_id']; ?>">
                <button type="submit" style="color: red;">Delete User Account</button>
            </form>
        </body>
        </html>
        <?php
    } else {
        echo "User not found.";
    }

    // Close the prepared statement and the database connection
    $stmt->close();
    $conn->close();
} else {
    echo "Invalid request.";
}
?>
