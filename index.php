<?php require("includes/header.php"); ?>
<?php require("includes/navbar.php"); ?>

<!-- ===== MAIN CONTENT START ===== -->

<div class="container mt-5">

    <h1 class="text-center">Welcome to EShopper 🛒</h1>
    <p class="text-center">Yeh tumhari ecommerce website ka home page hai</p>

    <!-- Example Products -->
    <div class="row mt-4">

        <div class="col-md-4">
            <div class="card">
                <img src="img/product-1.jpg" class="card-img-top" alt="">
                <div class="card-body text-center">
                    <h5>Product 1</h5>
                    <p>Rs. 1000</p>
                    <a href="product.php" class="btn btn-primary">View Detail</a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <img src="img/product-2.jpg" class="card-img-top" alt="">
                <div class="card-body text-center">
                    <h5>Product 2</h5>
                    <p>Rs. 1500</p>
                    <a href="product.php" class="btn btn-primary">View Detail</a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <img src="img/product-3.jpg" class="card-img-top" alt="">
                <div class="card-body text-center">
                    <h5>Product 3</h5>
                    <p>Rs. 2000</p>
                    <a href="product.php" class="btn btn-primary">View Detail</a>
                </div>
            </div>
        </div>

    </div>

</div>

<!-- ===== MAIN CONTENT END ===== -->

<?php require("includes/footer.php"); ?>