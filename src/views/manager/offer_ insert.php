<?php
if (isset($_POST["Submit"])) {
    $name = $_POST["Full name"];
    $email = $_POST["Email"];
    $address = $_POST["Address"];
    $phoneNumber = $_POST["phone number"];
    $provinces = $_POST["provinces"];
    $offers = $_POST["Offers"];

    $sql = "INSERT INTO Offers_details (owner_Full_name, owner_Email, owner_Address, owner_Phone_number, provinces, offers) VALUES ('$name', '$email', '$address', '$phoneNumber', '$provinces', '$offers')";

    if ($con->query($sql)) {
        echo "Successfully inserted record.";
    } else {
        echo "Error! Try again: " . $con->error;
    }

    $con->close();
}
?>