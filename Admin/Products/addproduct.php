<?php
include '../db.php';

if(isset($_POST['add_product'])){
    $name = $_POST['name'];
    $price = $_POST['price'];
    $desc = $_POST['description'];
    $image = $_POST['image'];

    $sql = "INSERT INTO products (name, price, description, image) 
            VALUES ('$name', '$price', '$desc', '$image')";

    if(mysqli_query($conn, $sql)){
        echo "Product added successfully!";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<h2>Add Product</h2>
<form method="POST">
    <input type="text" name="name" placeholder="Product Name" required><br><br>
    <input type="text" name="price" placeholder="Price" required><br><br>
    <textarea name="description" placeholder="Description" required></textarea><br><br>
    <input type="text" name="image" placeholder="Image URL"><br><br>
    <button type="submit" name="add_product">Add Product</button>
</form>