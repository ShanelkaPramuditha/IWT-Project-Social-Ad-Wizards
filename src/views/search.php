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

    <?php
    // connect to the database
    require_once '../config/database/connection.php';

    if (isset($_GET['search'])) {
        $search = $_GET['search'];
    }

    // prepare
    $sql = "SELECT * FROM gallery WHERE g_title LIKE '%$search%'";
    $result = $conn -> query($sql);

    // check and display the result
    if ($result -> num_rows > 0) {
        while ($row = $result -> fetch_assoc()) {
            $g_link = $row['g_link'];
            $g_title = $row['g_title'];
            $g_review = $row['g_review'];

            echo '<img width="25%" src="' . $g_link . '" alt="' . $g_title . '">';
            echo '<h3>' . $g_title . '</h3>';
        }
    }
    else {
        echo "<h3>No Result Found</h3>";
    }

    // close the connection
    $conn -> close();
    ?>

    <!-- Footer with PHP -->
    <?php include_once '../components/footer.php'; ?>
    
</body>
</html>
