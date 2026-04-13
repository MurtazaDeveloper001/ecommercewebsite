<?php
include 'config.php';

$sql = "INSERT INTO products (name, price) VALUES ('Test Product', '500')";

if(mysqli_query($conn, $sql)){
    echo "Insert OK";
} else {
    echo "Error: " . mysqli_error($conn);
}
?>