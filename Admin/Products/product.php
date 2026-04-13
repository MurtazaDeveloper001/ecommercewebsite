<?php
include 'db.php';

$sql = "SELECT * FROM products";
$result = mysqli_query($conn, $sql);
?>

<h2>Products</h2>
<div class="products">
<?php
while($row = mysqli_fetch_assoc($result)){
    echo "<div class='product'>";
    echo "<h3>".$row['name']."</h3>";
    echo "<p>Price: $".$row['price']."</p>";
    echo "<p>".$row['description']."</p>";
    echo "</div>";
}
?>
</div>






<?php
$sql = "SELECT * FROM products";
$result = mysqli_query($conn, $sql);
?>

<div class="products">
<?php
while($row = mysqli_fetch_assoc($result)){
    echo "<div class='product'>";
    echo "<h3>".$row['name']."</h3>";
    echo "<p>Price: $".$row['price']."</p>";
    echo "<p>".$row['description']."</p>";
    echo "</div>";
}
?>
</div>