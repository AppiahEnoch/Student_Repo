<?php 
$hosname = "localhost";
$username = "root";
$password = "";
$database = "practice";
$port = "63943";


//connection
$conn = mysqli_connect($hosname, $username,$password, $database,$port) or die("Database connection failed");
?>