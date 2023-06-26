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
    <title>Edit Profile</title>
    <!-- Page styles --> 
    <link rel="stylesheet" type="text/css" href="./src/css/edit-profile.css">
</head>
<body>
    <?php
    // Open Navigation bar with PHP
    include_once '../components/header.php';
    
    // Check if the user is logged in
    if (!isset($_SESSION['isLoggedIn'])) {
        // Redirect to the login page
        header('Location: ../views/home.php');
        exit;
    }

    // Include the database connection
    require_once '../config/database/connection.php';

    // Retrieve the user's profile data from the database
    $query = "SELECT * FROM registered_users WHERE s_user_id = $userId";
    $result = $conn->query($query);

    // Check if the user exists
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

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

        // Handle form submission
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Delete the old profile picture
            if ($profile_picture !== 'assets/images/uploads/profile-pictures/default.jpg') {
                if (basename ($_FILES['profile_picture']['name'] === 'default.jpg')) {
                $old_profile_picture = '../../' . $profile_picture;
                unlink($old_profile_picture);
                }
            }

            // Update profile picture if uploaded
            if (isset($_FILES['profile_picture']) && $_FILES['profile_picture']['error'] === UPLOAD_ERR_OK) {
                $target_dir = 'assets/images/uploads/profile-pictures/';
                $target_file = $target_dir . basename($_FILES['profile_picture']['name']);

                // Move the uploaded file to the target directory
                if (move_uploaded_file($_FILES['profile_picture']['tmp_name'], '../../' . $target_file)) {
                    // Update the profile picture path in the database
                    $query = "UPDATE registered_users SET profile_picture = '$target_file' WHERE s_user_id = $userId";
                    $conn->query($query);
                    $profile_picture = $target_file;
                    // Update the profile picture path in the session
                    $_SESSION['profile_picture'] = $profile_picture;
                } else {
                    echo "Error moving the uploaded file.";
                }
            }

            // Update other data with POST data
            $first_name = $_POST['first_name'];
            $last_name = $_POST['last_name'];
            $email = $_POST['email'];
            $phone_no = $_POST['phone_no'];
            $date_of_birth = $_POST['date_of_birth'];
            $gender = $_POST['gender'];

            // Update the user's profile data in the database
            $query = "UPDATE registered_users SET first_name = '$first_name', last_name = '$last_name', email = '$email', phone_no = '$phone_no', date_of_birth = '$date_of_birth', gender = '$gender' WHERE s_user_id = $userId";
            $conn->query($query);

            // Show a success message
            echo '<div style="text-align: center; margin-bottom: 20px;">Profile updated successfully!</div>';
        }

        // Display the profile information and form
        echo '<h1>Edit Profile</h1>';
        echo '<div class="profile-container">';
        echo '<img src="' . $profile_picture . '" alt="Profile Picture" class="profile-picture" onclick="changeProfilePicture()">';
        echo '<form class="profile-form" action="./src/views/edit-profile.php" method="POST" enctype="multipart/form-data">';
        echo '<label for="first_name">First Name:</label>';
        echo '<input type="text" id="first_name" name="first_name" value="' . $first_name . '" required>';
        echo '<label for="last_name">Last Name:</label>';
        echo '<input type="text" id="last_name" name="last_name" value="' . $last_name . '" required>';
        echo '<label for="email">Email:</label>';
        echo '<input type="email" id="email" name="email" value="' . $email . '" required>';
        echo '<label for="phone_no">Phone Number:</label>';
        echo '<input type="tel" id="phone_no" name="phone_no" value="' . $phone_no . '" required>';
        echo '<label for="date_of_birth">Date of Birth:</label>';
        echo '<input type="date" id="date_of_birth" name="date_of_birth" value="' . $date_of_birth . '" required>';
        echo '<label for="gender">Gender:</label>';
        echo '<select id="gender" name="gender" required>';
        echo '<option value="male"' . ($gender === 'male' ? ' selected' : '') . '>Male</option>';
        echo '<option value="female"' . ($gender === 'female' ? ' selected' : '') . '>Female</option>';
        echo '<option value="other"' . ($gender === 'other' ? ' selected' : '') . '>Other</option>';
        echo '</select>';
        echo '<label for="profile_picture">Change Profile Picture:</label>';
        echo '<input type="file" id="profile_picture" name="profile_picture">';
        // echo '<button type="submit" class="remove-picture-button" name="remove_picture">Remove Profile Picture</button>';
        echo '<button type="submit">Save Changes</button>';
        echo '</form>';
        echo '<form action="./src/config/database/delete/delete-account.php" method="POST" onsubmit="return confirm(\'Are you sure you want to delete your account?\');">';
        echo '<button type="submit" class="delete-account-button" name="delete_account">Delete Account</button>';
        echo '</form>';
        echo '</div>';
    } else {
        echo 'User not found.';
    }

    include_once '../components/footer.php';

    // Close the database connection
    $conn->close();
    ?>
</body>
</html>
