<?php
session_start();
require("config.php");

if(isset($_POST['add_product'])) {

    $category_id = $_POST['category_id'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $stock = $_POST['stock'];

    // image upload
    $image = $_FILES['image']['name'];
    $tmp = $_FILES['image']['tmp_name'];

    $folder = "uploads/" . time() . "_" . $image;
    move_uploaded_file($tmp, $folder);

    $stmt = $conn->prepare("
        INSERT INTO products 
        (category_id, name, description, price, stock, image, created_at) 
        VALUES (?, ?, ?, ?, ?, ?, NOW())
    ");

    $stmt->bind_param(
        "issdis",
        $category_id,
        $name,
        $description,
        $price,
        $stock,
        $folder
    );

    if($stmt->execute()){
        $success = "Product added successfully!";
    } else {
        $error = "Error adding product!";
    }
}
?>

<h2>Add Product</h2>

<?php if(isset($success)) echo "<p style='color:green'>$success</p>"; ?>
<?php if(isset($error)) echo "<p style='color:red'>$error</p>"; ?>

<form method="POST" enctype="multipart/form-data">

    <input type="number" name="category_id" placeholder="Category ID" required><br><br>

    <input type="text" name="name" placeholder="Product Name" required><br><br>

    <textarea name="description" placeholder="Description"></textarea><br><br>

    <input type="number" step="0.01" name="price" placeholder="Price" required><br><br>

    <input type="number" name="stock" placeholder="Stock" value="0"><br><br>

    <input type="file" name="image" required><br><br>

    <button type="submit" name="add_product">Add Product</button>

</form>