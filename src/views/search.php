<?php
session_start();
if (!isset($_SESSION['isLoggedIn']) || ($_SESSION['user_role'] !== 'manager')) {
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
    <title>Search Results</title>
    <!-- Page styles --> 
    <link rel="stylesheet" type="text/css" href="./src/css/search.css">
</head>

<body>
    <!-- Open Navigation bar with PHP -->
    <?php include_once '../components/header.php'; ?>

    <h2>Search Results</h2>
    
    <table>
        <thead>
            <tr>
                <th>Title</th>
                <th>Link</th>
                <th>Review</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Include the database connection
            require_once '../config/database/connection.php';

            // Check if search query is provided
            $search = isset($_GET['search']) ? $_GET['search'] : '';

            // Prepare the SQL statement with search condition
            $sql = "SELECT * FROM gallery WHERE g_title LIKE '%$search%'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $g_title = $row['g_title'];
                    $g_link = $row['g_link'];
                    $g_review = $row['g_review'];

                    echo "<tr>";
                    echo "<td>$g_title</td>";
                    echo "<td>$g_link</td>";
                    echo "<td>$g_review</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='3'>No results found</td></tr>";
            }

            // Close the database connection
            $conn->close();
            ?>
        </tbody>
    </table>

    <!-- Footer with PHP -->
    <?php include_once '../components/footer.php'; ?>
    
</body>
</html>
