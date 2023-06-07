<div id="popupOverlay"></div>
<!-- Form -->
<div id="popupContainer">
  <div id="popupContent">
    <h3>Sign In</h3>
    <form id="signInForm" action="./src/config/form/sign-in-action.php" method="POST" novalidate>
      <label for="email">E-mail</label>
      <input type="text" id="email" name="email" placeholder="Enter your email" required>
      
      <label for="password">Password</label>
      <input type="password" id="password" name="password" placeholder="Enter your password" required>

      <div class="remember-me">
        <input type="checkbox" id="rememberMe">
        <label for="rememberMe">Remember Me</label>
      </div>
      
      <button type="submit">Sign In</button>
    </form>
    <p class="sign-in">Looking to <a href="./src/views/sign-up.php">Create an account </a>?</p>
  </div>
</div>

<!-- Pop Up script -->
<script src="./src/components/sign-in/sign-in.js"></script>