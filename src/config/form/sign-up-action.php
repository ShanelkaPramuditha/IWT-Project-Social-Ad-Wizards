<?php
session_start();
require_once('../../config/database/connection.php');

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM registered_users WHERE email = '$email' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        // Login successful
        $_SESSION['email'] = $email;
        header("Location: ../../../index.php");
        exit;
    } else {
        // Login failed
        echo "Invalid email or password";
    }
} elseif (isset($_POST['signup'])) {
    $password = $_POST['password'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $dob = $_POST['birthday'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $p_number = $_POST['phone_no'];
    $role = $_POST['role'];

    $sql = "INSERT INTO registered_users (user_pass, email, gender, date_of_birth, first_name, last_name, phone_no, user_role) VALUES ('$password', '$email', '$gender', '$dob', '$fname', '$lname', '$p_number', '$role')";
    if ($conn->query($sql) === true) {
        // Registration successful
        $_SESSION['email'] = $email;
        header("Location: ../../../index.php");
        exit;
    } else {
        // Registration failed
        echo "Error: " . $conn -> error;
    }
}

$conn->close();
?>