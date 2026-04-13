<?php
session_start();
require("config.php");
require("includes/header.php");
require("includes/navbar.php");

$sql = "SELECT * FROM products ORDER BY product_id DESC";
$result = mysqli_query($conn, $sql);
?>

<div class="container mt-4">
    <h2 class="text-center mb-4">Products</h2>

    <div class="row">

        <?php while($row = mysqli_fetch_assoc($result)){ ?>

            <div class="col-md-3 mb-4">

                <div class="card h-100">

                    <img src="<?php echo $row['image']; ?>" 
                         class="card-img-top" 
                         style="height:200px; object-fit:cover;">

                    <div class="card-body text-center">

                        <h5><?php echo $row['name']; ?></h5>

                        <p>Price: <?php echo $row['price']; ?></p>

                        <p><?php echo $row['description']; ?></p>

                        <!-- ✅ ADD TO CART BUTTON -->
                        <a href="add_to_cart.php?id=<?php echo $row['product_id']; ?>" 
                           class="btn btn-primary btn-sm">
                           Add to Cart
                        </a>

                    </div>

                </div>

            </div>

        <?php } ?>

    </div>
</div>

<?php require("includes/footer.php"); ?>