<?php
// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the submitted username and password
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Perform your authentication logic here
    // For simplicity, let's assume the correct username is 'admin' and password is 'password'
    $correctUsername = 'admin';
    $correctPassword = 'test';

    if ($username === $correctUsername && $password === $correctPassword) {
        // Successful login
        // You can set session variables or redirect the user to a different page
        // For example, you can set a session variable 'isLoggedIn' to indicate the user is logged in
        session_start();
        $_SESSION['isLoggedIn'] = true;

        // Redirect the user to the home page or any desired page
        header('Location: ../../views/admin/dashboard-admin.php');
        exit;
    } else {
        // Invalid credentials, show an error message
        $errorMessage = 'Invalid username or password';
    }
}

// Dump the form data for debugging
var_dump($_POST);
?>

<!-- Display the error message if exists -->
<?php if (isset($errorMessage)) : ?>
    <p><?php echo $errorMessage; ?></p>
<?php endif; ?>