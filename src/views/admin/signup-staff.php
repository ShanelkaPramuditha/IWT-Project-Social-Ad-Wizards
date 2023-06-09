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


<!--Create the sinup form as the one element div-->
<h1>Sign Up</h1>

<form action="process-signup-staff.php" method="POST" id="signup" novalidate>
    <div>
        <label for="name">Name</label>
        <input type="text" id="name" name="name">
    </div>

    <div>
        <label for="email">Email</label>
        <input type="email" id="email" name="email">
    </div>

    <div>
        <label for="password">Password</label>
        <input type="password" id="password" name="password">
    </div>

    <div>
        <label for="password_confirmation">Repeat Password</label>
        <input type="password" id="password_confirmation" name="password_confirmation">
    </div>

    <button>Sign Up</button>
</form>

<!-- Footer with PHP -->
<?php include_once '../../components/footer.php'; ?>
</body>
</html>
