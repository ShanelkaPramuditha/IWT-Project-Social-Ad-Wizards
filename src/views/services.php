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
    <link rel="stylesheet" type="text/css" href="./src/css/services.css">
</head>

<body>
    <!-- open Navigation bar with PHP -->
    <?php include_once '../components/header.php'; ?>

  <h1 class="he">“We provide 3 main services for the
    effectiveness of your ads" </h1>


          <div class="one">
            <h2 style="font-size: 45px;color: rgb(69, 71, 74);">Facebook Ad creation</h2>
            
            <p> 
              Harness the power of targeted advertising on
               Facebook to reach your ideal audience, drive brand awareness, and generate 
               leads or sales through compelling ad creatives and strategic campaign management.</p>
               <img src="https://www.fluidscapes.in/wp-content/uploads/2021/11/instagram-ads-vs-facebook-ads-which-is-better-for-your-business.jpg">
          </div>
          
          <div class="two">
            <h2 style="font-size: 45px;color: rgb(69, 71, 74)">
              Instagram Ads Creation      
           </h2>
           
            <p>Leverage Instagram's visually-driven platform to captivate your audience, increase brand visibility, and drive engagement and conversions through captivating 
              ad visuals and strategic campaign optimization.</p>
            <img src="https://99designs-blog.imgix.net/blog/wp-content/uploads/2022/01/104317722.jpg?auto=format&q=60&fit=max&w=930" >
          </div>
         
          <div class="three"> 
            <h2 style="font-size: 45px; color: rgb(69, 71, 74);">
              YouTube Ads Creation                    
            </h2>
            
            <p>
              Tap into the vast reach of YouTube to deliver impactful video ads, reaching your target audience with engaging content, driving brand recognition, 
              and increasing website traffic or conversions through effective campaign execution. 
            </p>
            <img src="https://leadsdubai.com/wp-content/uploads/2021/02/Youtube-Banner.jpg">
          </div>

          <?php include_once '../components/footer.php'; ?>
        
       </body>
</html>