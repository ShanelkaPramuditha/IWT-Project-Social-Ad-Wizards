<?php
// Include the database connection
include '../../config/database/connection.php';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the image ID from the form data
    $g_id = $_POST['id'];

    // Get the updated image title from the form data
    $g_title = $_POST['title'];

    // Check if a new image file is uploaded
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        // Process the uploaded image file
        $imageFile = $_FILES['image'];
        
        // Retrieve the original image link from the database
        $query = "SELECT g_link FROM gallery WHERE g_id = ?";
        $stmt = mysqli_prepare($conn, $query);
        
        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "i", $g_id);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_bind_result($stmt, $g_link);
            mysqli_stmt_fetch($stmt);
            mysqli_stmt_close($stmt);
        } else {
            echo 'Unable to prepare the statement.';
            exit();
        }
        
        // Delete the original image file
        if ($g_link && file_exists($g_link)) {
            unlink($g_link);
        }
        
        // Generate a unique filename for the uploaded image
        $filename = uniqid() . '_' . $imageFile['name'];
        
        // Move the uploaded image file to the desired directory
        $destination = '../../../assets/images/uploads/gallery/' . $filename;
        if (move_uploaded_file($imageFile['tmp_name'], $destination)) {
            // Remove the first 10 characters from the destination path
            $g_link = substr($destination, 7);
            
            // Update the image link in the database
            $query = "UPDATE gallery SET g_link = ? WHERE g_id = ?";
            $stmt = mysqli_prepare($conn, $query);
            
            if ($stmt) {
                mysqli_stmt_bind_param($stmt, "si", $g_link, $g_id);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_close($stmt);
            } else {
                echo 'Unable to prepare the statement.';
                exit();
            }
        } else {
            echo 'Failed to move the uploaded image file.';
            exit();
        }
    }

    // Update the image title in the database
    $query = "UPDATE gallery SET g_title = ? WHERE g_id = ?";
    $stmt = mysqli_prepare($conn, $query);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "si", $g_title, $g_id);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    } else {
        echo 'Unable to prepare the statement.';
        exit();
    }

    // Redirect back to the gallery page
    header('Location: ../../views/gallery-more.php');
    exit();
} else {
    echo 'Invalid request.';
}
?>