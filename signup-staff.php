<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="assets/css/dashboard-admin.css">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" type="text/css" href="assets/css/signup.css">
</head>

<body>
    <!-- Navigation panel with PHP -->

<!--Create the sinup form as the one element div-->
<h1>Sign Up</h1>

<form action="process-signup-staff.php" method="POST" id="signup" novalidate>
    <div>
        <label for="name">Name</label>
        <input type="text" id="name" name="name">
    </div>

    <div>
        <label for="email">Email</label>
        <input type="email" id="email" name="email">
    </div>

    <div>
        <label for="password">Password</label>
        <input type="password" id="password" name="password">
    </div>

    <div>
        <label for="password_confirmation">Repeat Password</label>
        <input type="password" id="password_confirmation" name="password_confirmation">
    </div>

    <button>Sign Up</button>
</form>

<!-- Footer with PHP -->
<?php include 'footer.php' ?>
</body>
</html>
