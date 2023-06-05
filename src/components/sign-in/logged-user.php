<?php
session_start();

// Redirect to login page if the user is not logged in
if (!isset($_SESSION['email'])) {
    header("Location: logged-user.php");
    exit;
}

// Logout logic
if (isset($_POST['logout'])) {
    // Clear all session variables
    session_unset();

    // Destroy the session
    session_destroy();

    // Redirect to login page
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
</head>
<body>
    <h2>Welcome, <?php echo $_SESSION['email']; ?></h2>
    
    <!-- Logout form -->
    <form action="" method="post">
        <input type="submit" name="logout" value="Logout">test
    </form>
</body>
</html>