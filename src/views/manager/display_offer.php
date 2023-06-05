<?
 require"config.php";
 $sql="select*from my Table";
 $result = $con->query($sql);
      if($result->num_rows>0)
	  {
		  $row =$result->fetch_assoc())
	  echo"Full name:".$row["full name"];
	  echo"E-Mail:".$row["E-Mail"];
	  echo"Address:".$row["Address"];
	  echo"Phone number:".$row["Phone number"];
	  echo"provinces:".$row["Province"];
	  echo"offers:".$row["Offers"];
	  }
	  else
	  {
		  echo " not correct";
	  }
	  $con->close();
	  ?>