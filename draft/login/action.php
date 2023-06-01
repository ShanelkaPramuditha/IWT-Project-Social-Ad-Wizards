<?php
session_start();
require_once('connection.php');

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        // Login successful
        $_SESSION['username'] = $username;
        header("Location: dashboard.php");
        exit;
    } else {
        // Login failed
        echo "Invalid username or password";
    }
} elseif (isset($_POST['signup'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "INSERT INTO user (username, password) VALUES ('$username', '$password')";
    if ($conn->query($sql) === true) {
        // Registration successful
        $_SESSION['username'] = $username;
        header("Location: dashboard.php");
        exit;
    } else {
        // Registration failed
        echo "Error: " . $conn->error;
    }
}

$conn->close();
?>
