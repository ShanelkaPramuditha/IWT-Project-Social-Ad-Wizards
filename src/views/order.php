<?php
session_start();
if (!isset($_SESSION['isLoggedIn']) || ($_SESSION['user_role'] !== 'user')) {
    header('Location: ../home.php');
    exit;
}
?>

<!-- Import config file -->
<?php
require_once '../config/config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <base href="<?php echo BASE_URL; ?>">
    <link rel="icon" href="./assets/images/site-img/favicon/favicon.ico">
    <title>Place Order</title>
    <!-- Page styles -->
    <link rel="stylesheet" type="text/css" href="./src/css/order.css">
    <!-- JavaScript validation -->
    <script>
        function validateForm() {
            var user = document.getElementById("s_user_id").value;
            var platform = document.getElementById("ad_platform").value;
            var description = document.getElementById("order_desc").value;
            var category = document.getElementById("category").value;
            var format = document.getElementById("ad_format").value;
            var document = document.getElementById("document").value;

            // Check if any field is empty
            if (user === "" || platform === "" || description === "" || category === "" || format === "" || document === "") {
                alert("Please fill in all the required fields.");
                return false;
            }

            // Check if description is at least 10 characters long
            if (description.length < 10) {
                alert("Order description should be at least 10 characters long.");
                return false;
            }

            // Display confirmation dialog
            var confirmation = confirm("Are you sure you want to place the order?");
            return confirmation;
        }
    </script>
</head>

<body>
    <!-- open Navigation bar with PHP -->
    <?php include_once '../components/header.php'; ?>

    <div class="container">
        <?php
        include_once '../config/database/connection.php';

        // Retrieve data for drop-down lists
        $sql = "SELECT offer_id, offer_percentage FROM offer";
        $offerResult = $conn->query($sql);

        $sql = "SELECT s_user_id FROM registered_users";
        $userResult = $conn->query($sql);
        ?>
        <center><h1>Place Order</h1></center>
        <form method="POST" action="./src/config/form/order-action.php" onsubmit="return validateForm()">
            <label for="ad_platform">Platform:</label>
            <select name="ad_platform" id="ad_platform" required>
                <option></option>
                <option value="Facebook">Facebook</option>
                <option value="Twitter">Twitter</option>
                <option value="Instagram">Instagram</option>
                <option value="Youtube">Youtube</option>
                <!-- Add more options as needed -->
            </select>

            <label for="order_desc">Order Description:</label>
            <textarea name="order_desc" id="order_desc" required></textarea>

            <label for="category">Category:</label>
            <select name="category" id="category" required>
                <option></option>
                <option value="Clothing">Clothing</option>
                <option value="Electric Item">Electric Item</option>
                <option value="Other">Other</option>
                <!-- Add more options as needed -->
            </select>

            <label for="ad_format">Ad Format:</label>
            <select name="ad_format" id="ad_format" required>
                <option></option>
                <option value="video">Video</option>
                <option value="picture">Picture</option>
                <!-- Add more options as needed -->
            </select>

            <!-- <label for="document">Document:</label>
            <input type="file" name="document" id="document" required> -->


            <?php
            //create price variable
            $imagePrice = floatval(3000.00);
            $videoPrice = floatval(5500.00);

            // check the offers
            $sql = "SELECT * FROM offer";
            $result = $conn -> query($sql);

            if ($result -> num_rows > 0) {
                while ($row = $result -> fetch_assoc()) {
                echo 'There is a ' . floatval($row['offer_percentage']) . '% offer.';
                    // calculate the offer
                    $videoPrice = $videoPrice - (($videoPrice) * ($row['offer_percentage'])) / 100;
                    $imagePrice = $imagePrice - (($imagePrice) * ($row['offer_percentage'])) / 100;

                echo '<h2>Price of the advertisement with the offer,</h2>
                <p>Video ads : ' . $videoPrice . '</p>
                <p>Picture ads: ' . $imagePrice . '</p>
                </p>';
                }   
            }
            else {
            echo '<h2>Price of the advertisement,</h2>
                <p>Video ads : ' . $videoPrice . '</p>
                <p>Picture ads: ' . $imagePrice . '</p>
                </p>';
            }
            ?>

            <button type="submit">Insert Order</button>
        </form>
    </div>

    <!-- Footer with PHP -->
    <?php include_once '../components/footer.php'; ?>
</body>
</html>
