<?php
session_start();
require("config.php");

// agar user login nahi hai
if(!isset($_SESSION['user_id'])){
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$product_id = $_GET['id'];

// check product already cart me hai ya nahi
$check = "SELECT * FROM cart WHERE user_id='$user_id' AND product_id='$product_id'";
$result = mysqli_query($conn, $check);

if(mysqli_num_rows($result) > 0){
    // quantity +1
    mysqli_query($conn, "UPDATE cart SET quantity = quantity + 1 
                         WHERE user_id='$user_id' AND product_id='$product_id'");
} else {
    // new insert
    mysqli_query($conn, "INSERT INTO cart (user_id, product_id, quantity) 
                         VALUES ('$user_id', '$product_id', 1)");
}

// redirect to cart page
header("Location: cart.php");
exit();
?>
