<!-- Import config file -->
<?php
require_once '../config/config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <base href="<?php echo BASE_URL; ?>">
    <link rel="icon" href="./assets/images/site-img/favicon/favicon.ico">
    <title>Home</title>
    <!-- Import Style Sheets -->
    <link rel="stylesheet" type="text/css" href="./src/css/header.css">
    <link rel="stylesheet" type="text/css" href="./src/css/footer.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Page styles --> 
    <link rel="stylesheet" type="text/css" href="./src/css/contact.css">
</head>

<body>
    <!-- open Navigation bar with PHP -->
    <?php include_once '../components/header.php'; ?>

<style>


</style>
</head>
<form action="/action_page.php"></form>


<div class="container">
  <h3 >Contact Us</h3>
  
    <label for="name"> Name</label>
    <input type="text" id="name" name="name" placeholder="Your name..">

    <label for="email">Email</label>
    <input type="text" id="email" name="email" placeholder="Email..">

   

    <label for="subject">Message</label>
    <textarea id="subject" name="subject" placeholder="Write something.." style="height:100px"></textarea>

    <input class=" button"type="submit" value="Submit" >
    
  </form>
</div>
<img src="https://img.freepik.com/premium-photo/portrait-young-software-engineer-looking-camera-while-writing-code-workplace-with-multiple_236854-44715.jpg?w=2000" alt="Avatar" class="avatar">

<ul class="social-icons">
  <li><a href="#" class="facebook"><i class="fab fa-facebook"></i></a></li>
  <li><a href="#" class="instagram"><i class="fab fa-instagram"></i></a></li>
  <li><a href="#" class="linkedin"><i class="fab fa-linkedin"></i></a></li>
  <li><a href="#" class="telegram"><i class="fab fa-telegram"></i></a></li>
  <li><a href="#" class="twitter"><i class="fab fa-twitter"></i></a></li>
</ul>


</body>
</html>