<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatable" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="assets/css/answer.css">
    <title>Socail Ad Wizards</title>
</head>

<body>
    <!-- open Navigation bar with PHP -->
    <?php include 'header.php' ?>
   <br>
   <br>
   <br> 
   <br>
   <br>
<div class=controler>
    <h1>Answer Questions</h1>
</div>

<div class="al">	

<!--form creation-->
<form method="POST" action="config2.php" class="i">
<input type ="text" name="que"  placeholder="Question Summery" size="100" required>
<br>
<br>
<input type ="text" name="ans"  placeholder="Answer for the question" size="100" required></lable>
<br>
<br>
<center><input type="submit" class ="button"value="SEND Answers"></center>


</form>
</div>

</body>
</html>