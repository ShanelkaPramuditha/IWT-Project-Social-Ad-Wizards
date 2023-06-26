<?php
        // Database connection - below 4 lines depend on your pc local host details.
        $servername = 'localhost';
        $username = 'root';
        $password = '';
        $dbname = 'social_ad_wizards';  //this our common database name.
    
        // create a connection
        $conn = new mysqli($servername, $username, $password, $dbname);
    
        // check the connection
        if ($conn -> connect_error) {
            die ("Connection failed: " . $conn -> connect_error);
        }

        return $conn;
       /* else {
            echo "Connection Successful!";
        }
    
        $conn -> close(); */
?>