<?php

    // this line 4 to 7 depend on your pc local host details.
    $servername = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'test';  //this (test) our common database name. change it[Social_Ad_Wizards].

    // create the connction
    $conn = new mysqli($servername, $username, $password, $dbname);

    // check the connection
    if ($conn-> connect_error){
        die ("Connection failed:".$conn->connect_error);
    }else{
        echo "connection successfully";
    }

    $conn -> close();
?>