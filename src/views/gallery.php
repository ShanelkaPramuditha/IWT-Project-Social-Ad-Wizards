<!-- gallery.php -->

<?php
// session_start();
// Include the database connection
include '../config/database/connection.php';

// Prepare the SQL query to retrieve the highest ranking first 12 images
if (strpos ($currentPage, 'home.php') !== FALSE) {
    $query = "SELECT g_id, g_link, g_title FROM gallery ORDER BY g_review DESC LIMIT 12";
}
else {
    $query = "SELECT g_id, g_link, g_title FROM gallery ORDER BY g_review";
}
$result = mysqli_query($conn, $query);

// Check if any images are found
if (mysqli_num_rows($result) > 0) {
    // Output the HTML for each image
    echo '<div class="gallery-container">';
    while ($row = mysqli_fetch_assoc($result)) {
        $g_id = $row['g_id'];
        $g_link = $row['g_link'];
        $g_title = $row['g_title'];

        echo '<div class="responsive">';
        echo '<div class="gallery">';
        echo '<a target="_blank" href="' . $g_link . '">';
        echo '<img src="' . $g_link . '" alt="Image">';
        echo '</a>';
        echo '<div class="desc">' . $g_title . '</div>';
        
        // allow edit button for designers
        if (($isLoggedIn) && ($userRole === 'designer')) {
            echo '<div class="edit-button"><a href="./src/views/designer/edit.php?id=' . $g_id . '">Edit</a></div>';
        }
        
        echo '</div>';
        echo '</div>';
    }
    echo '</div>';
} else {
    // No images found
    echo 'No images found.';
}

// Close the database connection
mysqli_close($conn);
?>
<?php
if (strpos ($currentPage, 'home.php') !== FALSE) {
    echo '<button class="see-more-button"><a href="./src/views/gallery-more.php">See More</a></button>';
}
?>