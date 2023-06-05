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
    <link rel="icon" type="image/ico" href="./assets/images/site-img/favicon/favicon.ico">
    <title>About</title>
    <!-- Import Style Sheets -->
    <link rel="stylesheet" type="text/css" href="./src/css/header.css">
    <link rel="stylesheet" type="text/css" href="./src/css/footer.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Page styles --> 
    <link rel="stylesheet" type="text/css" href="./src/css/about.css">
</head>

<body>
    <!-- open Navigation bar with PHP -->
    <?php include_once '../components/header.php'; ?>

    <div class="background">
       
       </div>
       <form>
           <h3> About</h3>
   
           <p style="font-size: x-large;">
              At Ad Wizard, we are a dynamic advertising agency specializing in creating highly effective
               advertisements for our clients on Facebook, Instagram, and YouTube. With our deep understanding of these platforms 
               and their audiences, we craft compelling ad campaigns that drive brand awareness, engagement, and conversions. Our goal is to help businesses unlock their 
              full advertising potential and achieve remarkable results in the ever-evolving digital landscape.
           </p>
   
               </form>
               <div class="container">
                 <p>5 people In our team</p>
                  <p>Founded in 2023</p>  
                   <p>Sortlist member since 2022</p>               
                  <p>From Sri Lanka </p>
               </div>

               <?php include_once '../components/footer.php'; ?>
   </body>
   </html>