<?php
// Check and get the form data
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $user_pass = $_POST['password'];

    // Connect to the database
    include '../../config/database/connection.php';

    $sql = "SELECT email, user_pass, user_role FROM registered_users WHERE email = ? LIMIT 1";
    $stmt = $conn -> prepare ($sql);
    $stmt -> bind_param ('s', $email);
    $stmt -> execute ();
    $result = $stmt -> get_result ();

    // Check if row was returned
    if ($result -> num_rows === 1) {
        $row = $result -> fetch_assoc();

        // check input values with database
        if (($row['email'] === $email) && ($row['user_pass'] === $user_pass)) {
            // login successfully
            session_start ();
            $_SESSION['isLoggedIn'] = TRUE;
            $_SESSION['email'] = $row['email'];
            $_SESSION['user_role'] = $row['user_role'];

            if ($row['user_role'] === 'admin') {
                header('Location: ../../views/admin/dashboard-admin.php');
            }
            elseif ($row['user_role'] === 'manager') {
                header('Location: ../../views/manager/dashboard-manager.php');
            }
            elseif ($row['user_role'] === 'designer') {
                header('Location: ../../views/designer/dashboard-designer.php');
            }
            else {
                header('Location: ../../views/home.php');
            }
            exit;
        }
    }

    $errorMessage = 'Invalid Email or Password';

    $stmt -> close();
    $conn -> close();
}

var_dump($_POST);
?>

<!-- Display error message -->
<?php if (isset($errorMessage)) : ?>
    <p><?php echo $errorMessage; ?></p>
<?php endif; ?>