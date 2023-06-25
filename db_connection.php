<?php 
$hosname = "localhost";
$username = "root";
$password = "";
$database = "practice";

//connection
$conn = mysqli_connect($hosname, $username,$password, $database) or die("Database connection failed");
?>