<!DOCTYPE html>
<html lang = "sin">
  <style>
    body{
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'poppins',sans-serif;
      background-color:rgb(158, 213, 197);
      background-position: center;
    }
    header{
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      padding: 20px 100px;
      background-color:rgb(142, 195, 176);
      display: flex;
      justify-content: space-evenly;
      align-items: center;
      z-index: 80;
    }
    .logo{
      font-size: 3em;
      color:rgb(145, 127, 179);
      user-select: none;
    }
    .navigation a {
      position: relative;
      font-size: 1.5em;
      color:rgb(44, 44, 139);
      text-decoration: none;
      font-weight: 500;
      margin-left: 40px ;
    }
    .navigation .btnlogin-popup{
      width: 130px;
      height: 50px;
      background: transparent;
      border: 2px solid rgb(10, 10, 52);
      outline: none;
      border-radius: 6px;
      cursor: pointer;
      font-size: 1.1em;
      color: rgb(20, 49, 74);
      font-weight: 500;
      margin-left: 40px;
    }
    .signin{
      width: 400px; 
    height: 500px;
    border: 2px solid rgb(134, 134, 224);  
    border-radius: 20px;
    backdrop-filter: blur(20px);
    background-color:rgb(188, 234, 213);
    position: relative;
    box-shadow: 0 0 30px rgb(142, 195, 176); 
    top:200px; 
    display: flex;
    justify-content: center;
    align-items: center;
    bottom: 0; 
    left: 0; 
    right: 0; 
 
    margin: auto;
    }
    .button {
      width: 100%;
      height: 45px;
      background:rgb(148, 175, 159);
      border: none;
      outline: none;
      border-radius: 9px;
      cursor: pointer;
      font-size: 1em;
      font-weight: 500;
    }
    .signin_google{
      width: 100%;
      height: 45px;
      background:rgb(148, 175, 159);
      border: none;
      outline: none;
      border-radius: 9px;
      cursor: pointer;
      font-size: 1em;
      font-weight: 500;

    }
    .form_box h3 {
      font-size: 2em;
      color: rgb(23, 23, 88);
      text-align: center;
    }
    .input_field{
      width: 100%;
      height: 30px;
    }
    .agree{
      font-size: .9em;
      font-weight: 500;
      margin: -15px 0 15px;
      display: flex;
      justify-content: space-between;
      color: rgb(35, 35, 35);

    }


    </style>
<head>



<title>
  ad wizard login page
</title>
</head>
<body>
<header>
  <h1 class ="logo" >Ad Wizard logo </h1>
  <nav class="navigation">
    <a href="#">Home</a>
    <a href="#">Gallery</a>
    <a href="#">Services</a>
    <a href="#">About</a>
    <a href="#">Contact</a>
    <button class="btnlogin-popup">Login</button>
  </nav>
</header>


<div class="signin">
  <div class="form_box">
    <h3> Sign in</h3>
    <form action="#">
  
        <div class="input_field"> <span><i aria-hidden="true" class="fa fa-envelope"></i><ion-icon name="mail"></ion-icon></span>
          <input type="Username" name="Username" placeholder="Email" required />
        </div>
        <div class="input_field"> <span><i aria-hidden="true" class="fa fa-lock"></i><ion-icon name="lock-closed"></ion-icon></span>
          <input type="password" name="password" placeholder="Password" required />
        </div>
        <div class="input_field"> <span><i aria-hidden="true" class="fa fa-lock"></i><ion-icon name="lock-closed"></ion-icon></span>
          <input type="password" name="password" placeholder="Re-type Password" required />
        </div>
        <div class="row clearfix">
          <div class="col_half">
            <div class="input_field"> <span><i aria-hidden="true" class="fa fa-user"></i><ion-icon name="person-add"></ion-icon></span>
              <input type="text" name="name" placeholder="First Name" />
            </div>
          </div>
          <div class="col_half">
            <div class="input_field"> <span><i aria-hidden="true" class="fa fa-user"></i><ion-icon name="person-add"></ion-icon></span>
              <input type="text" name="name" placeholder="Last Name" required />
            </div>
          </div>
        </div>
            <div class="input_field radio_option">
            <input type="radio" name="radiogroup1" id="rd1">              <label for="rd1">Male</label>
            <input type="radio" name="radiogroup1" id="rd2">
            <label for="rd2">Female</label>
            </div>
            <div class="input_field select_option">
    
              <div class="select_arrow"></div>
            </div>
          <div class="agree">
            <input type="checkbox" id="cb1">
        <label for="cb1">I agree with terms and conditions</label>
          </div>
          <div class="input_field checkbox_option">
          </div>
        <input class="button" type="submit" value="Register" />
  
        <div class="or">OR</div>

<div class="right">
<button class="signin_google">Gmail</button>
</div>

</div>
</div>


    </form>
  </div>
</div>

<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
 <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
  
</body>
</html> 