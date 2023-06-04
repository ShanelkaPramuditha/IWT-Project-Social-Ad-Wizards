<?php
if( insset($_POST["Submit"]))
  {$name=$_POST["Full name"];
  {$email=$_POST["Email"];
  {$Address=$_POST["Address"];
  {$phone number=$_POST["phone nuumber"];
  {$provinces=$_POST["provinces"];
  {$Offers=$_POST["Offers"];
  $sql="INSERT INTO Offers_details (owner_Full name,owner_Email,owner_Address,owner_Phone number,provinces,offers)VALUES($name,$email,$Address,$phonenumber,$provinces,$Offers)";
  
     if($con->query($sql)){
		 echo" Successfully";
	 }
	 else{
		 echo"Error! Try again."$con->error;
	 }
	 $con->close();
	 
  
 ?> 