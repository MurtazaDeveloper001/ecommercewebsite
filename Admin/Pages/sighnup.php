<?php
require("includes/header.php");
require("includes/navbar.php");
require("config.php"); // yahan database connection

if(isset($_POST['signup'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $country = $_POST['country'];

    // Check if email already exists
    $check = $conn->query("SELECT * FROM users WHERE email='$email'");
    if($check->num_rows > 0){
        $error = "Email already registered!";
    } else {
        $sql = "INSERT INTO users (name,email,password,phone,address,city,country,created_at)
                VALUES ('$name','$email','$password','$phone','$address','$city','$country',NOW())";
        if($conn->query($sql)){
            $success = "Signup successful! <a href='login.php'>Login here</a>";
        } else {
            $error = "Error: ".$conn->error;
        }
    }
}
?>

<div class="container mt-5">
    <h2 class="text-center">Sign Up</h2>

    <?php if(isset($error)) echo "<div class='alert alert-danger'>$error</div>"; ?>
    <?php if(isset($success)) echo "<div class='alert alert-success'>$success</div>"; ?>

    <form method="POST" class="mt-4">
        <input type="text" name="name" placeholder="Name" class="form-control mb-2" required>
        <input type="email" name="email" placeholder="Email" class="form-control mb-2" required>
        <input type="password" name="password" placeholder="Password" class="form-control mb-2" required>
        <input type="text" name="phone" placeholder="Phone" class="form-control mb-2">
        <input type="text" name="address" placeholder="Address" class="form-control mb-2">
        <input type="text" name="city" placeholder="City" class="form-control mb-2">
        <input type="text" name="country" placeholder="Country" class="form-control mb-2">
        <button type="submit" name="signup" class="btn btn-primary">Sign Up</button>
    </form>

    <p class="mt-3">Already have an account? <a href="login.php">Login here</a></p>
</div>

<?php require("includes/footer.php"); ?>