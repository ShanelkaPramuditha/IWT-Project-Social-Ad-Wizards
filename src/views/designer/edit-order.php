<?php
session_start();
if (!isset($_SESSION['isLoggedIn']) || ($_SESSION['user_role'] !== 'designer')) {
    header('Location: ../home.php');
    exit;
}
?>

<!-- Import config file -->
<?php
require_once '../../config/config.php';
?>

<?php
// Include the database connection
include '../../config/database/connection.php';

// Check if the order_id is provided in the URL
if (isset($_GET['order_id'])) {
    $orderId = $_GET['order_id'];

    // Check if the form is submitted
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $releasedLink = $_POST['released_link'];

        $stmt = $conn->prepare("UPDATE order_info SET released_link = ?, released_date = CURRENT_TIMESTAMP(), order_status = 'Completed' WHERE order_id = ?");

        // Bind parameters to the update statement
        $stmt->bind_param("si", $releasedLink, $orderId);

        // Execute the update statement
        if ($stmt->execute()) {
            $oMessage  = 'Order Completed!';
        } else {
            echo "Error inserting released link: " . $stmt->error;
        }

        // Close the statement
        $stmt->close();
    }

    // Fetch the order details for the given order_id
    $stmt = $conn->prepare("SELECT * FROM order_info WHERE order_id = ?");
    $stmt->bind_param("i", $orderId);
    $stmt->execute();
    $result = $stmt->get_result();
    $order = $result->fetch_assoc();

    // Close the statement and database connection
    $stmt->close();
    $conn->close();
} else {
    echo "Order ID not provided.";
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
    <title>Designer Dashboard</title>
    <!-- Page styles --> 
    <link rel="stylesheet" type="text/css" href="./src/css/dashboard-admin.css">
</head>

<body>
    <!-- open Navigation bar with PHP -->
    <?php include_once '../../components/header.php'; ?>

    <h2>Edit Order</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) . '?order_id=' . $orderId; ?>" method="POST">

        <label for="released_link">Released Link:</label>
        <input type="text" id="released_link" name="released_link" required><br><br>

        <button type="submit">Submit</button>
    </form>
    <!-- Footer with PHP -->
    <?php include_once '../../components/footer.php'; ?>
    
</body>
</html>



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
                window.location.href = "./src/views/designer/dashboard-designer.php";
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
        background-color: white;
        border: 1px solid #ccc;
        padding: 20px;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
        text-align: center;
        font-size: 16px;
        font-weight: bold;
    }
</style>