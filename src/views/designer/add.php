<!-- add.php -->

<?php
// Include the database connection
include '../../config/database/connection.php';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the image details from the form data
    $g_title = $_POST['title'];

    // Check if an image file is uploaded
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        // Process the uploaded image file
        $imageFile = $_FILES['image'];

        // Generate a unique filename for the uploaded image
        $filename = uniqid() . '_' . $imageFile['name'];

        // Move the uploaded image file to the desired directory
        $destination = '../../../assets/images/uploads/gallery/' . $filename;
        if (move_uploaded_file($imageFile['tmp_name'], $destination)) {
            // Insert the image details into the database
            $g_link = substr($destination, 7);
            $query = "INSERT INTO gallery (g_link, g_title) VALUES (?, ?)";
            $stmt = mysqli_prepare($conn, $query);

            if ($stmt) {
                mysqli_stmt_bind_param($stmt, "ss", $g_link, $g_title);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_close($stmt);
            } else {
                echo 'Unable to prepare the statement.';
                exit();
            }

            // Redirect back to the gallery page
            header('Location: ../gallery-more.php');
            exit();
        } else {
            echo 'Failed to move the uploaded image file.';
            exit();
        }
    } else {
        echo 'No image file uploaded.';
        exit();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add to Gallery</title>
</head>
<body>
    <h2>Add Image to Gallery</h2>
    <form action="" method="post" enctype="multipart/form-data">
        <label for="title">Image Title:</label>
        <input type="text" name="title" required>
        <label for="image">Image File:</label>
        <input type="file" name="image" required>
        <input type="submit" value="Add to Gallery">
    </form>
</body>
</html>
