<?php include_once 'header.php'; ?>
  <header>
    <div class="topic">Social Ad Wizards</div>
    <h2 class="logo"></i>Logo</h2>
    <nav class="navigation">
      <a href="#">HOME</a>
      <a href="#">GALLERY</a>
      <a href="#">SERVICES</a>
      <a href="#">ABOUT</a>
      <a href="#">CONTACT</a>
      <button class="btnlogin-popup"> Login</button>
    </nav>
  </header>
  
  <div class="wrapper">
    <div class="form-box login">
      <h2>Login</h2>
      <form action="input-box">
        <span class="icon"><ion-icon name="mail-open-outline"></ion-icon></span>
         <input type="email" required>
          <label for="email">Email</label>
           </div>
            <div class="input-box">
            <span class="icon"><ion-icon name="lock-open-outline"></ion-icon></span>
             <input type="password" required>
              <label for="password">Password</label>

              <div class="remember-forget">
                <label><input type="checkbox">Remember me.</label>
                <a href="#"> Forget Password?</a>
              </div>
              <button type="submit" class="btn">Login</button>
              <div class="login-register">
                <p>Don't have an account ? <a href="#" class="register-link">Register</a></p>
              </div>
            </div>  
       </form>
    </div>
  </div>
  <script src="script.js"></script>
  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
<?php include_once 'footer.php'; ?>