<!-- Import config file -->
<?php
require_once '../config/config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <base href="<?php echo BASE_URL; ?>">
    <link rel="icon" href="./assets/images/site-img/favicon/favicon.ico">
    <title>My Profile</title>
    <!-- Page styles --> 
    <link rel="stylesheet" type="text/css" href="./src/css/profile.css">
</head>

<body>
<!-- open Navigation bar with PHP -->
<?php include_once '../components/header.php'; ?>


<?php

// Check if the user is logged in
if (!$isLoggedIn) {
    // Redirect to the login page or show an appropriate message
    header('Location: ./home.php');
    exit;
}

// Include the database connection
include '../config/database/connection.php';

// Get the logged-in user's ID
$s_user_id = $_SESSION['s_user_id'];

// Get the user's profile data from the database
$query = "SELECT * FROM registered_users WHERE s_user_id = ?";
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, "i", $s_user_id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

// Check if the user exists
if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);

    // Extract the profile data
    $profile_picture = $row['profile_picture'];
    $registered_date = $row['registered_date'];
    $email = $row['email'];
    $gender = $row['gender'];
    $date_of_birth = $row['date_of_birth'];
    $first_name = $row['first_name'];
    $last_name = $row['last_name'];
    $phone_no = $row['phone_no'];
    $user_role = $row['user_role'];

    // Display the profile information
    echo '<h1>Profile Information</h1>';
    echo '<div class="profile-container">';
    echo '<img src="./' . $profile_picture . '" alt="Profile Picture" width="30%">';
    echo '<p><strong>Name:</strong> ' . $first_name . ' ' . $last_name . '</p>';
    echo '<p><strong>Date of Birth:</strong> ' . $date_of_birth . '</p>';
    echo '<p><strong>Gender:</strong> ' . $gender . '</p>';
    echo '<p><strong>Email:</strong> ' . $email . '</p>';
    echo '<p><strong>Phone Number:</strong> ' . $phone_no . '</p>';
    echo '</div>';

    // Edit Profile button
    echo '<a href="./src/views/edit-profile.php" class="edit-profile-button">Edit Profile</a>';
} else {
    echo 'User not found.';
}

// Close the database connection
mysqli_close($conn);
?>

<!-- Import the footer -->
<?php include_once '../components/footer.php'; ?>
</body>
</html>
