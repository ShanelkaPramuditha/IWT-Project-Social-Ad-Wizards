<!-- Import config file -->
<?php
require_once '../config/config.php';
?>

<!DOCTYPE html>
<html lang="en">
<!-- <style 
    </style> -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <base href="<?php echo BASE_URL; ?>">
    <!-- Import Style Sheets -->
    <link rel="stylesheet" type="text/css" href="././src/css/header.css">
    <link rel="stylesheet" type="text/css" href="././src/css/footer.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Page styles --> 
    <link rel="stylesheet" type="text/css" href="./src/css/faq.css">
    <title>FAQ</title>
</head>

<body>
    <!-- open Navigation bar with PHP -->
    <?php include_once '../../header.php' ?>

<div>

<h1>test</h1></br>
<h1>test</h1></br>
    <h1>FAQ</h1>

<div class="al">	

<!--form creation-->
<form method="POST" action="config.php" class="i">
<center>Question :
<input type ="text" name="name"  placeholder="  Ask your Question...." size="100"></center>
<br>
<br>
<center><input type="submit" class ="button"value="SEND"></center>


</form>
    </div>
</div>
    <!-- Footer bar with PHP -->
    <?php include_once '../components/footer.php' ?>
</body>
</html>