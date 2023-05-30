<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="assets/css/signup.css">
    <title>Sign up form</title>
    
</head>
<body>
    
 
    <!--Create the sinup form as the one element div-->
    <form action="signup.inc.php" style="border:1px solid #ccc">
        <div class="container">
            <h1>Sign Up</h1>
            <p>Please fill in this form to create an account.</p>
            <hr>
            
            <label for="first name"><b>First Name</b></label>
            <input type="text" placeholder="Enter the first name" name="fname" required>
            <br>
            <label for="last name"><b>Last Name</b></label>
            <input type="text" placeholder="Enter the last name" name="lname" required>
            <br>
            <label for="email"><b>Email</b></label>
            <input type="email" placeholder="Enter Email" name="email" required>
            <br>
            <label for="phone"><b>Phone Number</b></label>
            <input type="phone" placeholder="Enter phone number" name="phone" required>
            <br>
            <label for="dob"><b>Date of Birth</b></label>
            <input type="date" placeholder="Enter Email" name="dob" required>
            <br>
            <label for="gender"><b>Gender</b></label>
                <select name="gender" id="gender">
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select><br>
                <br>
            <label for="psw"><b>Password</b></label>            
            <input type="password" placeholder="Enter Password" name="psw" required>
            <br>
            <label for="psw-repeat"><b>Repeat Password</b></label>
            <input type="password" placeholder="Repeat Password" name="psw-repeat" required>
            
            <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>
            
            <div class="clearfix">
                <button type="button" class="cancelbtn">Cancel</button>
                <button type="submit" name="submit" class="signupbtn">Submit</button>
            </div>
        </div>
        
        <?php include_once 'footer.php'?>
    </body>
    </html>