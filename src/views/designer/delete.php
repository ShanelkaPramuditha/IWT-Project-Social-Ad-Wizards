<!-- delete.php -->

<?php
// Include the database connection
include '../../config/database/connection.php';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the image ID from the form data
    $g_id = $_POST['id'];

    // Retrieve the image link from the database
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

    $g_link_path = '../../.' . $g_link;
    // Delete the image file
    if ($g_link_path && file_exists($g_link_path)) {
        if (unlink($g_link_path)) {
            // Delete the image record from the database
            $deleteQuery = "DELETE FROM gallery WHERE g_id = ?";
            $deleteStmt = mysqli_prepare($conn, $deleteQuery);

            if ($deleteStmt) {
                mysqli_stmt_bind_param($deleteStmt, "i", $g_id);
                mysqli_stmt_execute($deleteStmt);
                mysqli_stmt_close($deleteStmt);

                // Confirmation message with the image link
                echo "Image with link $g_link has been successfully deleted.";

                // Redirect back to the gallery page
                header('Location: ../../views/gallery-more.php');
                exit();
            } else {
                echo 'Unable to prepare the delete statement.';
                exit();
            }
        } else {
            echo 'Failed to delete the image file.';
            exit();
        }
    } else {
        echo 'Image file not found' . $g_link_path;
        exit();
    }
} else {
    echo 'Invalid request.';
    exit();
}

// Close the database connection
mysqli_close($conn);
?>
