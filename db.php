<?php
$host = "localhost";
$user = "root";
$password = "";
$dbname = "eshopper_db";

// Create connection
$conn = mysqli_connect($host, $user, $password, $dbname);

// Check connection
if(!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Set charset
mysqli_set_charset($conn, "utf8");
?>

