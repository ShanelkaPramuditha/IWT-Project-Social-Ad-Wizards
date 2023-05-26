<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatable" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="assets/css/contact.css">
    <title>Socail Ad Wizards</title>
</head>

<body>
    <!-- open Navigation bar with PHP -->
    <?php include 'header.php' ?>

<div class=controler>
    <h1>Contact Us</h1>
    
    <form method="post">
        Name
        <input type="text" placeholder="Name">
        <br>
        Email
        <input type="email" placeholder="Email">
        <br>
        Message
        <br>
        <textarea cols="7" rows="3" placeholder="Message"></textarea>
        <br>
        <input type="submit" value="send"> 
    </form>

</div>
</body>
</html>