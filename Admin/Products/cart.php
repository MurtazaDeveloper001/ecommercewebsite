<?php
session_start();
require("config.php");
require("includes/header.php");
require("includes/navbar.php");

if(!isset($_SESSION['user_id'])){
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

$sql = "SELECT products.name, products.price, products.image, cart.quantity, cart.product_id
        FROM cart 
        JOIN products ON cart.product_id = products.product_id
        WHERE cart.user_id = '$user_id'";

$result = mysqli_query($conn, $sql);

$total = 0;
?>

<div class="container mt-4">
    <h2 class="text-center mb-4">Your Cart</h2>

    <table class="table table-bordered text-center">
        <tr>
            <th>Image</th>
            <th>Name</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Total</th>
        </tr>

        <?php while($row = mysqli_fetch_assoc($result)){ 
            $item_total = $row['price'] * $row['quantity'];
            $total += $item_total;
        ?>

        <tr>
            <td><img src="<?php echo $row['image']; ?>" width="80"></td>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['price']; ?></td>
            <td><?php echo $row['quantity']; ?></td>
            <td><?php echo $item_total; ?></td>
        </tr>

        <?php } ?>

        <tr>
            <td colspan="4"><strong>Total</strong></td>
            <td><strong><?php echo $total; ?></strong></td>
        </tr>

    </table>
</div>

<?php require("includes/footer.php"); ?>