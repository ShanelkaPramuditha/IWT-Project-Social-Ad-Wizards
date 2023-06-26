<?php
// Retrieve form data
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Insert form data into the table
    $sql = "INSERT INTO contact_messages (c_name, email, c_message) VALUES ('$name', '$email', '$message')";
}

require_once('../database/connection.php');


if ($conn -> query($sql) === TRUE) {
    $oMessage = 'Message sent successfully!';
} else {
    $oMessage = "Error: " . $sql . "<br>" . $conn -> error;
}

$conn->close();

// Import config file
require_once '../config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <base href="<?php echo BASE_URL; ?>">
    <link rel="stylesheet" href="./src/css/alert-box.css">
</head>
<body>
    <!-- displaying message in a pop-up -->
    <?php
    echo "<script>
        var oMessage = '$oMessage';
    </script>";
    if (isset($oMessage)) : ?>
        <script src="./src/js/alert-box.js"></script>
    <?php endif; ?>
</body>
</html>