<!DOCTYPE html>
<html>
<head>
    <title>Edit Profile</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        h1 {
            text-align: center;
        }

        .profile-container {
            max-width: 500px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f5f5f5;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .profile-picture {
            display: block;
            width: 150px;
            height: 150px;
            margin: 0 auto 20px;
            border-radius: 50%;
            object-fit: cover;
            cursor: pointer;
        }

        .profile-form input,
        .profile-form select {
            display: block;
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
            font-size: 16px;
        }

        .profile-form button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        .delete-account-button {
            background-color: #f44336;
        }

        .remove-picture-button {
            background-color: #f44336;
        }
    </style>
</head>
<body>
    <?php
    session_start();

    // Check if the user is logged in
    if (!isset($_SESSION['isLoggedIn'])) {
        // Redirect to the login page or show an appropriate message
        header('Location: login.php');
        exit;
    }

    // Include the database connection
    include '../config/database/connection.php';

    // Get the logged-in user's ID
    $s_user_id = $_SESSION['s_user_id'];

    // Retrieve the user's profile data from the database
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

        // Handle form submission
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Delete the old profile picture if it's not the default picture
            if ($profile_picture !== 'assets/images/uploads/profile-pictures/default.jpg') {
                $old_profile_picture = '../../' . $profile_picture;
                unlink($old_profile_picture);
            }

            // Update profile picture if uploaded
            if (isset($_FILES['profile_picture']) && $_FILES['profile_picture']['error'] === UPLOAD_ERR_OK) {
                $target_dir = 'assets/images/uploads/profile-pictures/';
                $target_file = $target_dir . basename($_FILES['profile_picture']['name']);

                // Move the uploaded file to the target directory
                move_uploaded_file($_FILES['profile_picture']['tmp_name'], '../../' . $target_file);

                // Update the profile picture path in the database
                $query = "UPDATE registered_users SET profile_picture = ? WHERE s_user_id = ?";
                $stmt = mysqli_prepare($conn, $query);
                mysqli_stmt_bind_param($stmt, "si", $target_file, $s_user_id);
                mysqli_stmt_execute($stmt);
                $profile_picture = $target_file;
            }

            // Handle other form fields and update the database accordingly
            // ...

            // Show a success message
            echo '<div style="text-align: center; margin-bottom: 20px;">Profile updated successfully!</div>';
        }

        // Delete the profile picture
        if (isset($_POST['remove_picture'])) {
            // Delete the old profile picture if it's not the default picture
            if ($profile_picture !== 'assets/images/uploads/profile-pictures/default.jpg') {
                $old_profile_picture = '../../' . $profile_picture;
                unlink($old_profile_picture);

                // Update the profile picture path in the database
                $query = "UPDATE registered_users SET profile_picture = ? WHERE s_user_id = ?";
                $stmt = mysqli_prepare($conn, $query);
                $default_profile_picture = 'assets/images/uploads/profile-pictures/default.jpg';
                mysqli_stmt_bind_param($stmt, "si", $default_profile_picture, $s_user_id);
                mysqli_stmt_execute($stmt);
                $profile_picture = $default_profile_picture;

                echo '<div style="text-align: center; margin-bottom: 20px;">Profile picture removed successfully!</div>';
            }
        }

        // Display the profile information and form
        echo '<h1>Edit Profile</h1>';
        echo '<div class="profile-container">';
        echo '<img src="../../' . $profile_picture . '" alt="Profile Picture" class="profile-picture" onclick="changeProfilePicture()">';
        echo '<form class="profile-form" action="edit-profile.php" method="POST" enctype="multipart/form-data">';
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
        echo '<button type="submit" class="remove-picture-button" name="remove_picture">Remove Profile Picture</button>';
        echo '<button type="submit">Save Changes</button>';
        
        echo '</form>';
        echo '<form action="../config/database/delete/delete-account.php" method="POST" onsubmit="return confirm(\'Are you sure you want to delete your account?\');">';
        echo '<button type="submit" class="delete-account-button" name="delete_account">Delete Account</button>';
        echo '</form>';
        echo '</div>';
    } else {
        echo 'User not found.';
    }

    // Close the database connection
    mysqli_close($conn);
    ?>
</body>
</html>
