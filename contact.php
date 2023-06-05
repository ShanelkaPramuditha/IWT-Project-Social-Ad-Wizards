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

<div>
   
    

   <head>
<style>
*
 {box-sizing: border-box;
}
body{
    background-color: #1d7ee5;
}

input[type=text], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 10px;
  box-sizing: border-box;
  margin-top: 6px;
  margin-bottom: 16px;
  resize: vertical;
}

input[type=submit] {
  background-color: #ffffff;
    color: #080710;
    padding: 12px 20px;
    font-size: 15px;
    font-weight: 500;
    border-radius: 10px;
    cursor: pointer;
}

input[type=submit]:hover {
  background-color: #2f8aeb;
  border: none;
  
}

.container {
  
    height: 550px;
    width: 500px;
    background-color: rgba(255,255,255,0.13);
    position: absolute;
    transform: translate(-50%,-50%);
    top: 50%;
    left: 35%;
    border-radius: 10px;
    backdrop-filter: blur(10px);
    border: 2px solid rgba(255,255,255,0.1);
    box-shadow: 0 0 40px rgba(8,7,16,0.6);
    padding: 50px 35px;
    font-family: 'Poppins',sans-serif;
    color: aliceblue;


}
.container h3{
    font-size: 32px;
    font-weight: 500;
    line-height: 42px;
    text-align: left;
}

label{
    display: block;
    margin-top: 10px;
    font-size: 16px;
    font-weight: 500;
}
form *{
    font-family: 'Poppins',sans-serif;
    color: #ffffff;
    letter-spacing: 0.5px;
    outline: none;
    border: none;
}
.avatar {
  vertical-align: middle;
  width: 100px;
  height: 100px;
  border-radius: 10%;
position: absolute;
width: 354px;
height: 306px;
left: 800px;
top: 156px;

}

.social-icons {
  list-style: none;
  padding: 750px;
  display: flex;
  justify-content: center;
}

.social-icons li {
  margin: 0 10px;
}

.social-icons a {
  display: inline-block;
  width: 100px;
  height: 100px;
  border-radius: 50%;
  background-color: #14273c;
  text-align: center;
  line-height: 40px;
  color: #ffffff;
  font-size: 20px;
  transition: background-color 0.3s ease;
  top: 300px;
}

.social-icons a:hover {
  background-color: #68e08a;
  color: #2f8aeb;
}

.facebook {
  background-color: #3b5998;
}

.instagram {
  background-color: #c13584;
}

.linkedin {
   background: #007bb5;
  color: white;
}

.telegram {
  background-color: #0088cc;
}

.twitter {
  background-color: #1da1f2;
}

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
</html>