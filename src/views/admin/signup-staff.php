<?php
require_once '../../config/config.php';

session_start();

// Redirect to dashboard if the user is already logged in
if (isset($_SESSION['admin'])) {
    header("Location: ../../index.php");
    exit;
}
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
    <link rel="stylesheet" type="text/css" href="./src/css/sign-up.css">
    <script>
        function validateForm() {
            var fname = document.forms["signupForm"]["fname"].value;
            var lname = document.forms["signupForm"]["lname"].value;
            var email = document.forms["signupForm"]["email"].value;
            var phoneNo = document.forms["signupForm"]["phone_no"].value;
            var birthday = document.forms["signupForm"]["birthday"].value;
            var gender = document.forms["signupForm"]["gender"].value;
            var password = document.forms["signupForm"]["password"].value;
            var confirmPassword = document.forms["signupForm"]["confirm_password"].value;
            var agree = document.getElementById("cb1").checked;

            // Check if first name is empty
            if (fname.trim() === "") {
                alert("Please enter your first name");
                return false;
            }

            // Check if last name is empty
            if (lname.trim() === "") {
                alert("Please enter your last name");
                return false;
            }

            // Check if email is empty or not valid
            if (email.trim() === "") {
                alert("Please enter a valid email address");
                return false;
            }

            // Check if phone number is empty or not valid
            if (phoneNo.trim() === "" || !/^\d{10}$/.test(phoneNo)) {
                alert("Please enter a valid 10-digit phone number");
                return false;
            }

            // Check if birthday is empty
            if (birthday.trim() === "") {
                alert("Please enter your date of birth");
                return false;
            }

            // Check if gender is selected
            if (gender === "") {
                alert("Please select your gender");
                return false;
            }

            // Check if password is empty or doesn't meet the criteria
            if (password.trim() === "" || !/(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}/.test(password)) {
                alert("Please enter a password with at least 8 characters, including lowercase and uppercase letters, and a number");
                return false;
            }

            // Check if confirm password matches the password
            if (confirmPassword.trim() === "" || confirmPassword !== password) {
                alert("Please confirm your password correctly");
                return false;
            }

            // Check if agree checkbox is checked
            if (!agree) {
                alert("Please accept the terms of use and privacy policy");
                return false;
            }

            return true;
        }
    </script>
</head>

<body>
    <!-- open Navigation bar with PHP -->
    <?php include_once '../../components/header.php'; ?>

    <div class="form">
        <form name="signupForm" action="./src/config/form/sign-up-action.php" method="POST" onsubmit="return validateForm()">
            <?php
                // Check if the user is logged in
                // Start the session if it has not been started
                if (session_status() == PHP_SESSION_NONE) {
                    session_start();
                }
                if ((isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn'])) {
                    // User is logged in
                    echo '<h3>Create Staff Account</h3>';
                } else {
                    // User is not logged in
                    echo '<h3>Sign up</h3>';
                }
            ?>
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
                <div class="input_field">
                    <span><i aria-hidden="true" class="fa fa-envelope"></i></span>
                    <label for="email">E-mail</label><br>
                    <input type="email" name="email" placeholder="E-mail" required>
                </div>
                <div class="input_field">
                    <label for="phone_no">Phone Number</label><br>
                    <input type="text" name="phone_no" placeholder="Phone Number" required><br>
                </div>
                <div class="input_field">
                    <label for="birthday">Date of Birth</label><br>
                    <input type="date" id="birthday" name="birthday" required><br>
                </div>
                <div class="input_field">
                    <label for="gender">Gender</label><br>
                    <select name="gender" required>
                        <option value="">Select</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select><br>
                </div>
                <div class="input_field">
                    <span><i aria-hidden="true" class="fa fa-lock"></i><ion-icon name="lock-closed"></ion-icon></span>
                    <label for="password">Password</label><br>
                    <input type="password" name="password" placeholder="Password" required>
                </div>
                <div class="input_field">
                    <span><i aria-hidden="true" class="fa fa-lock"></i><ion-icon name="lock-closed"></ion-icon></span>
                    <label for="confirm_password">Confirm Password</label><br>
                    <input type="password" name="confirm_password" placeholder="Re-type Password" required>
                </div>
                <div class="input_field">
                    <label for="role">User Role</label><br>
                    <select name="role" required>
                        <option value="">Select</option>
                        <option value="manager">Manager</option>
                        <option value="designer">Designer</option>
                    </select><br>
                </div>
            </div>
            <div class="agree">
                <input type="checkbox" id="cb1">
                <label for="cb1">I accept the Terms of use & Privacy policy</label>
            </div>
            <input class="button" type="submit" name="staff-signup" value="Sign Up" />
        </form>
    </div>

    <?php include_once '../../components/footer.php'; ?>
</body>

</html>
