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
    include_once '../config/database/connection.php';

    // Execute a query
    $sql = "SELECT * FROM faq";
    $result = $conn->query($sql);

    // Generate HTML table
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $question = $row["question"];
            $answer = $row["answer"];

            if (!empty($question) && !empty($answer)) {
                echo '
                    <p>Q: ' . $question . '</p>
                    <p>A: ' . $answer . '</p><hr>';
            }
        }
        echo "</table>";
    } else {
        echo "No data found.";
    }

    // Close the connection
    $conn->close();
    ?>


<?php
    if (($isLoggedIn === TRUE) && ($userRole === 'user')): ?>

    <div class="al">

    <!--form creation-->
    <form method="POST" action="./src/config/form/faq-action.php" class="faq">
    <center>Question :
    <input type ="text" name="question"  placeholder="  Ask your Question...." size="100" class="input-box"></center>
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