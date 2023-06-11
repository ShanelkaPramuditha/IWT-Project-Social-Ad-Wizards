<?php
// Check and get the form data
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $user_pass = $_POST['password'];

    // Connect to the database
    include '../../config/database/connection.php';

    $sql = "SELECT s_user_id, email, user_pass, user_role FROM registered_users WHERE email = ? LIMIT 1";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if row was returned
    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();

        // Check input values with database
        if (($row['email'] === $email) && (password_verify($user_pass, $row['user_pass']))) {
            // Login successfully
            session_start();
            $_SESSION['isLoggedIn'] = true;
            $_SESSION['email'] = $row['email'];
            $_SESSION['user_role'] = $row['user_role'];
            $_SESSION['s_user_id'] = $row['s_user_id'];
            $_SESSION['first_name'] = $row['first_name'];
            $_SESSION['profile_picture'] = $row['profile_picture'];

            if ($row['user_role'] === 'admin') {
                header('Location: ../../views/admin/dashboard-admin.php');
            } elseif ($row['user_role'] === 'manager') {
                header('Location: ../../views/manager/dashboard-manager.php');
            } elseif ($row['user_role'] === 'designer') {
                header('Location: ../../views/designer/dashboard-designer.php');
            } else {
                header('Location: ../../views/home.php');
            }
            exit;
        }
    }

    $Message = 'Invalid Email or Password';

    $stmt->close();
    $conn->close();
}
?>

<!-- displaying the message in a pop-up -->

<script>
    <?php if (isset($Message)) : ?>
        window.addEventListener('DOMContentLoaded', function () {
            var alertBox = document.createElement('div');
            alertBox.classList.add('error-alert');
            alertBox.textContent = "<?php echo $Message; ?>";
            document.body.appendChild(alertBox);
            setTimeout(function () {
                alertBox.style.display = 'none';
                window.location.href = "../../views/home.php";
            }, 3000); // 3000 milliseconds = 3 seconds
        });
    <?php endif; ?>
</script>

<style>
    .error-alert {
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: #ffdddd;
        border: 1px solid #ff0000;
        padding: 20px;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
        text-align: center;
        font-size: 16px;
        font-weight: bold;
        color: #ff0000;
    }
</style>