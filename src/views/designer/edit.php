<!-- Import config file -->
<?php
require_once '../../config/config.php';
?>

<base href="<?php echo BASE_URL; ?>">

<!-- Header with PHP -->
<?php include_once '../../components/header.php'; ?>

<?php
// Include the database connection
include '../../config/database/connection.php';

// Check if the image ID is provided as a parameter
if (isset($_GET['id'])) {
    // Get the image ID from the parameter
    $g_id = $_GET['id'];

    // Retrieve the image details from the database
    $query = "SELECT g_link, g_title FROM gallery WHERE g_id = ?";
    $stmt = mysqli_prepare($conn, $query);
    
    // Check if the prepared statement is successful
    if ($stmt) {
        // Bind the image ID to the prepared statement
        mysqli_stmt_bind_param($stmt, "i", $g_id);
        
        // Execute the prepared statement
        mysqli_stmt_execute($stmt);
        
        // Bind the result variables
        mysqli_stmt_bind_result($stmt, $g_link, $g_title);
        
        // Fetch the image details
        if (mysqli_stmt_fetch($stmt)) {
            ?>
            <h2>Edit Image Details</h2>
            <form action="update.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php echo $g_id; ?>">
                <label for="title">Image Title:</label>
                <input type="text" name="title" value="<?php echo $g_title; ?>">
                <label for="image">Upload New Image:</label>
                <input type="file" name="image">
                <button type="submit">Update</button>
            </form>

            <!-- Delete button -->
            <form action="delete.php" method="post">
                <input type="hidden" name="id" value="<?php echo $g_id; ?>">
                <button type="submit">Delete</button>
            </form>
            <?php
        } else {
            echo 'Image not found.';
        }
        
        // Close the prepared statement
        mysqli_stmt_close($stmt);
    } else {
        echo 'Unable to prepare the statement.';
    }
} else {
    echo 'Image ID not provided.';
}

// Close the database connection
mysqli_close($conn);
?>

<!-- Footer with PHP -->
<?php include_once '../../components/footer.php'; ?>

<!-- Import external CSS -->
<link rel="stylesheet" type="text/css" href="./src/css/edit.css">