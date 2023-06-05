<?php
   if(isset($_POST["submit"])){
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $dob = $_POST["dob"];
    $gender = $_POST["gender"];
    $psw = $_POST["psw"];
    $pswRepeat = $_POST["psw-repeat"];

    require_once 'connection.php';

    if (emptyInputs($fname, $lname, $email, $phone, $dob, $gender, $psw, $pswRepeat) !== false){
        exit();
    }
    

   }else{
    header('location:../login.php');
    exit();
   }
    

?>