<!DOCTYPE html>
<html lang="en">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  text-transform: capitalize;
}
body{
  font-family: sans-serif;
}
.container{
  max-width: 1170px;
  margin: auto;
}
.footer{
  background: #399ede;
  padding: 70px;
}
.row{
  display: flex;
  flex-wrap: wrap;
}
.footer-col{
  width: 25%;
  padding: 0 15px;

}
.footer-col h4{
  font-size: 18px;
  color: rgb(31, 85, 133);
  margin-bottom: 25px;
  font-weight: 500;
  position: relative;

}
.footer-col h4::before{
  content: '';
  position: absolute;
  left: 0;
  bottom: -10px;
  background:#0a3e66;
  height: 2px;
  box-sizing: border-box;
  width: 50px;
}
.footer-col ul{
  list-style: none;
}
.footer-col ul p{
  font-size: 16px;
  text-decoration: none;
  color: white;
  display: block;

}
.footer-col li{
  font-size: 16px;
  text-decoration: none;
  color: white;
  display: block;
}
.fa {
  padding: 18px;
  font-size: 30px;
  width: 20px;
  text-align:left;
  text-decoration: none;
}

.fa:hover {
    opacity: 0.7;
}

  
</style>
<head>
   <title>Ad wizard</title>
    
</head>

<body>
<div class="footer">
    <div class="container">
      <div class="row">
      <div class="footer-col">
        <h4>ABOUT US</h4>
        <ul>
          <p> We also work on creating advertisement for display on social media. Our designers will work to create your ad as appealing as you want it to be.</p>
          <p><a href="dashboard-admin.php">See more...</a></p>
        </ul>
      </div>  
<div class="footer-col">
  <h4>FAQ</h4>
  <ul>
    <p>Q : How much time is needed an ad designing?</p>
    <p>  A : 3 days or less.</p>
 
    <p>Q : Do I have to be registered to create an advertisement?</p>
      <p>A : Yes, definitely.</p>
 
    <p><a href="manager-faq.php">See more...</a></p>
  </ul>
</div>
<div class="footer-col">
  <h4>GET IN TOUCH</h4>
  <ul>
    <li>Tel : +94 777123456</li>
     <li> E-mail : socialadwizards@gmail.com</li>      
     <p> Message to us...</p>
  </ul>
</div>
<div class="footer-col">
  <h4>FOLLOW US</h4>
  <div class="social-link">
    <a href="#" class="fa fa-twitter"></a>
    <a href="#" class="fa fa-pinterest"></a>
    <a href="#" class="fa fa-instagram"></a>
    <a href="#" class="fa fa-facebook"></a>
    <a href="#" class="fa fa-github"></a>
    

  </div>
</div>
</div>
</div>
</div>
</body>
</html>