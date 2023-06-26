<?php
session_start();
require_once('../../config/database/connection.php');

// Normal users sign up
if (isset($_POST['signup'])) {
    $password = $_POST['password'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $dob = $_POST['birthday'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $p_number = $_POST['phone_no'];

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO registered_users (user_pass, email, gender, date_of_birth, first_name, last_name, phone_no, user_role) VALUES ('$hashedPassword', '$email', '$gender', '$dob', '$fname', '$lname', '$p_number', DEFAULT)";
    if ($conn -> query($sql) === true) {
        // Registration successful
        $_SESSION['email'] = $email;
        header("Location: ../../../index.php");
        exit;
    } else {
        // Registration failed
        echo "Error: " . $conn -> error;
    }
}
// staff account creation
elseif (isset($_POST['staff-signup'])) {
    $password = $_POST['password'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $dob = $_POST['birthday'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $p_number = $_POST['phone_no'];
    $role = $_POST['role'];

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO registered_users (user_pass, email, gender, date_of_birth, first_name, last_name, phone_no, user_role) VALUES ('$hashedPassword', '$email', '$gender', '$dob', '$fname', '$lname', '$p_number', '$role')";
    if ($conn->query($sql) === true) {
        // Registration successful
        $_SESSION['email'] = $email;
        header("Location: ../../views/admin/dashboard-admin.php");
        exit;
    } else {
        // Registration failed
        echo "Error: " . $conn -> error;
    }
}

$conn->close();
?>