<?php
session_start();
if (!isset($_SESSION['isLoggedIn']) || ($_SESSION['user_role'] !== 'manager')) {
    header('Location: ../home.php');
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
    <title>Edit FAQ</title>
    <!-- Page styles --> 
    <link rel="stylesheet" type="text/css" href="./src/css/faq-manage.css">
</head>

<body>
    <!-- open Navigation bar with PHP -->
    <?php include_once '../../components/header.php'; ?>

    <?php
    include_once '../../config/database/connection.php';

    // Check if the FAQ ID is provided
    if (isset($_GET['faq_id'])) {
        $faqId = $_GET['faq_id'];

        // Fetch the FAQ record from the database
        $sql = "SELECT * FROM faq WHERE faq_id = $faqId";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $question = $row['question'];
            $answer = $row['answer'];

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                // Check if the delete button is clicked
                if (isset($_POST['delete'])) {
                    // Perform the delete operation
                    $deleteSql = "DELETE FROM faq WHERE faq_id = $faqId";
                    if ($conn->query($deleteSql) === true) {
                        echo "FAQ deleted successfully.";
                    } else {
                        echo "Error deleting FAQ: " . $conn->error;
                    }
                } else {
                    // Update the question and answer values
                    $newQuestion = $_POST['question'];
                    $newAnswer = $_POST['answer'];

                    // Perform the update operation
                    $updateSql = "UPDATE faq SET question = '$newQuestion', answer = '$newAnswer' WHERE faq_id = $faqId";
                    if ($conn->query($updateSql) === true) {
                        echo "FAQ updated successfully.";
                        // Refresh the page to display the updated content
                        // echo "<script>window.location.reload();</script>";
                    } else {
                        echo "Error updating FAQ: " . $conn->error;
                    }
                }
            }

            echo '
                <form method="POST" action="">
                    <input type="hidden" name="faq_id" value="' . $faqId . '">
                    <label for="question">Question:</label>
                    <textarea name="question">' . $question . '</textarea>
                    <label for="answer">Answer:</label>
                    <textarea name="answer">' . $answer . '</textarea>
                    <button type="submit">Save</button>
                    <button type="submit" name="delete">Delete</button>
                </form>
            ';
        } else {
            echo "FAQ not found.";
        }
    } else {
        echo "FAQ ID not provided.";
    }

    // Close the connection
    $conn->close();
    ?>

    <!-- Footer with PHP -->
    <?php include_once '../../components/footer.php'; ?>
</body>
</html>
