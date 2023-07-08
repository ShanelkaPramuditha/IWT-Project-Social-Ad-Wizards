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

// Initialize variables for error messages
$titleError = $imageError = '';

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
            // Check if the form is submitted
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                // Validate the title
                $title = trim($_POST['title']);
                if (empty($title)) {
                    $titleError = 'Please enter an image title.';
                }

                // Validate the image
                if (empty($_FILES['image']['name'])) {
                    $imageError = 'Please select a new image.';
                }

                // If there are no errors, update the image details
                if (empty($titleError) && empty($imageError)) {
                    // Update the image details in the database and upload the new image
                    // ...
                    // Redirect to the updated image page or display a success message
                    // ...
                }
            }
            ?>

            <h2>Edit Image Details</h2>
            <form action="./src/views/designer/update.php" method="post" enctype="multipart/form-data" onsubmit="return validateForm()">
                <input type="hidden" name="id" value="<?php echo $g_id; ?>">
                <label for="title">Image Title:</label>
                <input type="text" name="title" value="<?php echo $g_title; ?>">
                <span class="error"><?php echo $titleError; ?></span> <!-- Error message display element -->
                <label for="image">Upload New Image:</label>
                <input type="file" name="image">
                <span class="error"><?php echo $imageError; ?></span> <!-- Error message display element -->
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

<script>
    function validateForm() {
        var title = document.getElementsByName("title")[0].value;
        var image = document.getElementsByName("image")[0].value;
        var titleErrorElement = document.querySelector(".error:first-of-type");
        var imageErrorElement = document.querySelector(".error:last-of-type");

        // Clear previous error messages
        titleErrorElement.textContent = "";
        imageErrorElement.textContent = "";

        // Check if the title is empty
        if (title.trim() === "") {
            titleErrorElement.textContent = "Please enter an image title.";
            return false;
        }

        // Check if an image is selected
        if (image.trim() === "") {
            imageErrorElement.textContent = "Please select a new image.";
            return false;
        }

        return true;
    }
</script>