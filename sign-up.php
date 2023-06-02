<?php
session_start();

// Redirect to dashboard if the user is already logged in
if (isset($_SESSION['email'])) {
    header("Location: logged-user.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Sign up</title>
  <style>
    * {
      box-sizing: border-box;
    }

    body {
      background-color: #1d7ee5;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      font-family: Arial, sans-serif;
    }

    .form {
      width: 500px;
      background-color: rgba(255, 255, 255, 0.13);
      border-radius: 10px;
      padding: 50px;
      box-shadow: 0 0 40px rgba(8, 7, 16, 0.6);
      backdrop-filter: blur(10px);
    }

    .form h3 {
      text-align: center;
      font-size: 24px;
      color: #fff;
      margin-bottom: 30px;
    }

    .form-row {
      display: grid;
      grid-template-columns: 1fr 1fr;
      grid-gap: 20px;
      margin-bottom: 20px;
    }

    .form-row label {
      font-size: 16px;
      font-weight: bold;
      color: #fff;
      margin-bottom: 5px;
    }

    .form-row input,
    .form-row select {
      width: 100%;
      height: 40px;
      padding: 5px 10px;
      border-radius: 3px;
      border: none;
      background-color: rgba(255, 255, 255, 0.07);
      color: #fff;
      font-size: 14px;
    }

    .form-row .input_field {
      position: relative;
    }

    .form-row .input_field span {
      position: absolute;
      top: 50%;
      left: 15px;
      transform: translateY(-50%);
      color: #fff;
    }

    .form-row .input_field input {
      padding-left: 40px;
    }

    .form-row .input_field i {
      margin-right: 4px;
    }

    .form-row .agree label {
      font-size: 14px;
    }

    .submit-btn {
      display: flex;
      justify-content: center;
    }

    .button {
      margin-top: 50px;
    width: 100%;
    background-color: #ffffff;
    padding: 15px 0;
    font-size: 18px;
    font-weight: 600;
    border-radius: 1px;
    cursor: pointer;
    border-radius: 8px;
    border: 0;
    }
    .agree {
    display: flex;
    align-items: flex-start;
    size:5px ;
    color: #fff;
    }
  </style>
</head>

<body>
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
</body>
</html>

      