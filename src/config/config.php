<!-- Configurations -->

<!-- Create base URL -->
<!-- Edit base_path variable to the your project folder path (only after the root folder). 

My project path:
  C:\xampp\htdocs\myproject\IWT-Project-Social-Ad-Wizards\
Path Variable define for above path:
  $base_path = '/myproject/IWT-Project-Social-Ad-Wizards/'; -->

<?php
$base_path = '/IWT-Project-Social-Ad-Wizards/';
define ('BASE_URL', 'http://' . $_SERVER['HTTP_HOST'] . $base_path);
?>
