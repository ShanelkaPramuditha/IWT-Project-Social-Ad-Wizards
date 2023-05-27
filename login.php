<!DOCTYPE html>
<html lang = "en">
  
<head>
  <title>
    ad wizard login page
  </title>
  <link rel="stylesheet" type="text/css" href="assets/css/login.css">
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

  <div class="wrapper">
    <div class="form-box">
    
        <h2>Sign in </h2>
          <form action="#">
            <div class="input_field"> <span><i aria-hidden="true" class="fa fa-envelope"></i><ion-icon name="person"></ion-icon></span>
              <input type="username" name="username" placeholder="Username" required />
            </div>
            <div class="input_field"> <span><i aria-hidden="true" class="fa fa-lock"></i><ion-icon name="lock-closed"></ion-icon></span>
              <input type="password" name="password" placeholder="Password" required />
            </div>

    <div class=" remember-forgot">
       <label><input type="checkbox"> Remember me</label>
     <a href="#">Forgot Password? </a>
</div>

 <button type="submit" class="btn">Login </button>

 <div class="login-register">
     <p>Don't have an account?
  <a href="sign in.html" class=" register-link">Register</a>
    </p>                               
</div>
</form>
       </div>
            <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
            <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
  
</body>
</html> 