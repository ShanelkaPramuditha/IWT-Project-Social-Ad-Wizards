<?php
require "config.php";

$sql = "SELECT * FROM myTable";
$result = $con->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo "Full name: " . $row["full_name"] . "<br>";
    echo "E-Mail: " . $row["E-Mail"] . "<br>";
    echo "Address: " . $row["Address"] . "<br>";
    echo "Phone number: " . $row["Phone_number"] . "<br>";
    echo "Provinces: " . $row["Province"] . "<br>";
    echo "Offers: " . $row["Offers"] . "<br>";
} else {
    echo "No records found";
}

$con->close();
?>