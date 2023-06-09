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
    <title>Manage Offer</title>
    <!-- Page styles --> 
    <link rel="stylesheet" type="text/css" href="./src/css/offer-manage.css">
</head>

<body>
    <!-- open Navigation bar with PHP -->
    <?php include_once '../../components/header.php'; ?>

    <h2>Import Offer Data</h2>
    <form method="POST" action="./src/config/form/offer-manage-action.php">

        <label for="offer_percentage">Offer Percentage:</label>
        <input type="text" name="offer_percentage" required><br>

        <label for="o_end_date">End Date:</label>
        <input type="date" name="o_end_date" required><br>

        <input type="submit" value="Submit">
    </form>

    <h2>Manage Offers</h2>
    <table>
        <thead>
            <tr>
                <th>Offer Percentage</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Include the database connection
            require_once '../../config/database/connection.php';

            // Retrieve previous offers from the database
            $query = "SELECT * FROM offer";
            $result = $conn->query($query);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $offer_id = $row['offer_id'];
                    $offer_percentage = $row['offer_percentage'];
                    $o_start_date = $row['o_start_date'];
                    $o_end_date = $row['o_end_date'];

                    echo "<tr>";
                    echo "<td>$offer_percentage</td>";
                    echo "<td>$o_start_date</td>";
                    echo "<td>$o_end_date</td>";
                    echo "<td>";
                    echo "<a href='edit-offer.php?id=$offer_id'>Edit</a> | ";
                    echo "<a href='./src/config/database/delete/delete-offer.php?id=$offer_id'>Delete</a>";
                    echo "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='4'>No offers found</td></tr>";
            }

            // Close the database connection
            $conn->close();
            ?>
        </tbody>
    </table>


    <!-- Footer with PHP -->
    <?php include_once '../../components/footer.php'; ?>
    
</body>
</html>
