<?php
session_start();
if (!isset($_SESSION['isLoggedIn']) || ($_SESSION['user_role'] !== 'user')) {
    header('Location: ../home.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Import config file
    require_once '../../config/config.php';
    // Import database connection
    require_once '../../config/database/connection.php';

    // Retrieve form data
    $sUserId = $_SESSION['s_user_id'];
    $adPlatform = $_POST['ad_platform'];
    $orderDesc = $_POST['order_desc'];
    $category = $_POST['category'];
    $adFormat = $_POST['ad_format'];

    if ($adFormat === 'video') {
        //create price variable
        $videoPrice = floatval(5500.00);

        // check the offers
        $sql = "SELECT * FROM offer";
        $result = $conn -> query($sql);

        if ($result -> num_rows > 0) {
            while ($row = $result -> fetch_assoc()) {
                $offer = floatval($row['offer_percentage']);
                // calculate the order value
                $orderValue = $videoPrice - (($videoPrice) * $offer) / 100; 
            }
        }
    }
    elseif ($adFormat === 'picture') {
        //create price variable
        $picturePrice = floatval(3000.00);

        // check the offers
        $sql = "SELECT * FROM offer";
        $result = $conn -> query($sql);

        if ($result -> num_rows > 0) {
            while ($row = $result -> fetch_assoc()) {
                $offer = floatval($row['offer_percentage']);
                // calculate the order value
                $orderValue = $picturePrice - (($picturePrice) * $offer) / 100; 
            }
        }
    }

    // Prepare the SQL statement
    $sql = "INSERT INTO order_info (s_user_id, ad_platform, order_desc, category, ad_format, order_value) 
            VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssss", $sUserId, $adPlatform, $orderDesc, $category, $adFormat, $orderValue);

    // Execute the statement
    if ($stmt->execute()) {
        $oMessage = 'Order placed successfully.';
    } else {
        $oMessage = 'Error placing order: ' . $stmt->error;
    }

    // Close the statement and the database connection
    $stmt->close();
    $conn->close();
}
?>


<!-- displaying message in a pop-up -->
<script>
    <?php if (isset($oMessage)) : ?>
        window.addEventListener('DOMContentLoaded', function () {
            var alertBox = document.createElement('div');
            alertBox.classList.add('alert-box');
            alertBox.textContent = "<?php echo $oMessage; ?>";
            document.body.appendChild(alertBox);
            setTimeout(function () {
                alertBox.style.display = 'none';
                window.location.href = "../../views/home.php";
            }, 3000); // 3000 milliseconds = 3 seconds
        });
    <?php endif; ?>
</script>

<style>
    .alert-box {
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: transparent;
        border: 1px solid #ccc;
        padding: 20px;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
        text-align: center;
        font-size: 16px;
        font-weight: bold;
    }
</style>
