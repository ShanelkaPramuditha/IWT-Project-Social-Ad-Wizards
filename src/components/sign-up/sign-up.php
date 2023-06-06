<?php
session_start();

// Redirect to dashboard if the user is already logged in
if (isset($_SESSION['email'])) {
    header("Location: logged-user.php");
    exit;
}
?>

<!-- Import config file -->
<?php
require_once '../../config/config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <base href="<?php echo BASE_URL; ?>">
    <link rel="icon" href="./assets/images/site-img/favicon/favicon.ico">
    <title>Home</title>
    <!-- Page styles --> 
    <link rel="stylesheet" type="text/css" href="./src/css/home.css">
</head>

<body>
    <!-- open Navigation bar with PHP -->
    <?php include_once '../../components/header.php'; ?>

  <div class="form">
    <form action="action.php" method="POST">
      <h3>Sign up</h3>
      <div class="form-row">
        <div class="input_field">
          <span><i class="fa fa-user" aria-hidden="true"></i></span>
          <label for="fname">First Name</label>
          <input type="text" name="fname" placeholder="First Name" required>
        </div>
        <div class="input_field">
          <span><i class="fa fa-user" aria-hidden="true"></i></span>
          <label for="lname">Last Name</label>
          <input type="text" name="lname" placeholder="Last Name" required>
          
        </div>
        <div class="input_field"> <span><i aria-hidden="true" class="fa fa-envelope"></i></span>
          <label for="email">E-mail</label><br>
          <input type="email" name="email" placeholder="E-mail" required>
        </div>
        
        <div>
          <label for="phone_no">Phone Number</label><br>
          <input type="text" name="phone_no" placeholder="Phone Number" required><br>
        </div>

        <div>
          <label for="birthday">Date of Birth</label><br>
          <input type="date" id="birthday" name="birthday" required><br>
        </div>

        <div>
          <label for="gender">Gender</label><br>
          <select name="gender" required>
            <option value="male">Male</option>
            <option value="female">Female</option>
          </select><br>
        </div>
        
        <div class="input_field"> <span><i aria-hidden="true" class="fa fa-lock"></i><ion-icon name="lock-closed"></ion-icon></span>
          <label for="password">Password</label><br>
          <input type="password" name="password" placeholder="Password" required>
        </div>

        <div class="input_field"> <span><i aria-hidden="true" class="fa fa-lock"></i><ion-icon name="lock-closed"></ion-icon></span>
          <label for="password">Confirm Password</label><br>
          <input type="password" name="password" placeholder="Re-type Password" required>
        </div>
  
         
      </div>
      <div class="agree">
        <input type="checkbox" id="cb1">
    <label for="cb1">I accept the Terms of use & Privacy policy</label>
      </div>
      <div class="input_field checkbox_option"></div>
    <input class="button" type="submit" name="signup" value="Sign Up"/>
    </div>
  </form>

  <?php include_once '../../components/footer.php'; ?>
</body>
</html>

      