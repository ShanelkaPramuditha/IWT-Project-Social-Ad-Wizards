<?php
// Include the database connection
include '../connection.php';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the order_id from the form
    $order_id = $_POST['order_id'];

    // Retrieve the updated order information from the form
    $s_user_id = $_POST['s_user_id'];
    $order_date = $_POST['order_date'];
    $order_status = $_POST['order_status'];
    $ad_platform = $_POST['ad_platform'];
    $order_desc = $_POST['order_desc'];
    $category = $_POST['category'];
    $ad_format = $_POST['ad_format'];
    $order_status = 'Approved';

    // Update the order in the database
    $query = "UPDATE order_info SET order_date=?, order_status=?, ad_platform=?, order_desc=?, category=?, ad_format=? WHERE order_id=?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "ssssssi", $order_date, $order_status, $ad_platform, $order_desc, $category, $ad_format, $order_id);
    $result = mysqli_stmt_execute($stmt);

    // Check if the update was successful
    if ($result) {
        $oMessage = 'Order updated successfully.';
    } else {
        $oMessage = 'Error updating order.';
    }
} else {
    $oMessage =  'Invalid request.';
}

// Close the database connection
mysqli_close($conn);
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
                window.location.href = "../../../views/manager/dashboard-manager.php";
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
