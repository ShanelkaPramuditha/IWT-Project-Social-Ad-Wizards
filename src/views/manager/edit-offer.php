<?php
session_start();
if (!isset ($_SESSION['isLoggedIn']) || ($_SESSION['user_role'] !== 'manager')) {
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
    <title>Edit Offer</title>
    <!-- Page styles --> 
    <link rel="stylesheet" type="text/css" href="./src/css/offer-manage.css">
</head>

<body>
    <!-- open Navigation bar with PHP -->
    <?php include_once '../../components/header.php'; ?>

    <?php
    // Check if the offer ID is provided in the URL
    if (isset($_GET['id'])) {
        $offer_id = $_GET['id'];

        // Include the database connection
        require_once '../../config/database/connection.php';

        // Retrieve the offer details from the database
        $query = "SELECT * FROM offer WHERE offer_id = '$offer_id'";
        $result = $conn->query($query);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $offer_percentage = $row['offer_percentage'];
            $o_start_date = $row['o_start_date'];
            // $o_end_date = $row['o_end_date'];
            ?>

            <center><h2>Edit Offer</h2></center>
            <hr>
            <form method="POST" action="./src/config/database/update/update-offer-action.php">

                <input type="hidden" name="offer_id" value="<?php echo $offer_id; ?>">

                <label for="offer_percentage">Offer Percentage:</label>
                <input type="text" name="offer_percentage" value="<?php echo $offer_percentage; ?>" required><br>

                <!-- <label for="o_end_date">End Date:</label>
                <input type="date" name="o_end_date" value="<?php echo $o_end_date; ?>"><br> -->

                <input type="submit" value="Update">
            </form>

            <?php
        } else {
            echo "<center>No offer found</center>";
        }

        // Close the database connection
        $conn->close();
    } else {
        echo "<center>Invalid offer ID</center>";
    }
    ?>

    <!-- Footer with PHP -->
    <?php include_once '../../components/footer.php'; ?>
    
</body>
</html>
