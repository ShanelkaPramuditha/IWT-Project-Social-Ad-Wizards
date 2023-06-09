<!-- Import config file -->
<?php require_once '../config/config.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <base href="<?php echo BASE_URL; ?>">
    <link rel="icon" href="./assets/images/site-img/favicon/favicon.ico">
    <title>Manager Dashboard</title>
    <!-- Page styles --> 
    <link rel="stylesheet" type="text/css" href="./src/css/faq.css">
</head>

<body>
<!-- open Navigation bar with PHP -->
<?php include_once '../components/header.php'; ?>

<h1>FAQ! Need any help?</h1>

<?php
    session_start();
    if (isset($_SESSION['isLoggedIn']) && ($_SESSION['isLoggedIn'] === true) && ($_SESSION['user_role'] === 'user')): ?>

    <div class="al">

    <!--form creation-->
    <form method="POST" action="./src/config/form/faq-action.php" class="faq">
    <center>Question :
    <input type ="text" name="name"  placeholder="  Ask your Question...." size="100"></center>
    <br>
    <br>
    <center><input type="submit" class ="button"value="SEND"></center>


    </form>
        </div>
    </div>

    <?php endif; ?>
    <!-- Footer bar with PHP -->
    <?php include_once '../components/footer.php' ?>
</body>
</html>