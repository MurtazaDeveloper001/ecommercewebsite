<?php
require("includes/header.php");
require("includes/navbar.php");
require("config.php");

if(isset($_POST['signup'])) {

    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $phone = trim($_POST['phone']);
    $address = trim($_POST['address']);
    $city = trim($_POST['city']);
    $country = trim($_POST['country']);

    // Basic validation
    if(empty($name) || empty($email) || empty($password)) {
        $error = "Name, Email aur Password required hain!";
    } else {

        // Check email exists (SECURE)
        $stmt = $conn->prepare("SELECT id FROM users WHERE email=?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if($result->num_rows > 0){
            $error = "Email already registered!";
        } else {

            // Password hash
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            // Insert user (SECURE)
            $stmt = $conn->prepare("INSERT INTO users 
            (name, email, password, phone, address, city, country, created_at) 
            VALUES (?, ?, ?, ?, ?, ?, ?, NOW())");

            $stmt->bind_param(
                "sssssss",
                $name,
                $email,
                $hashedPassword,
                $phone,
                $address,
                $city,
                $country
            );

            if($stmt->execute()){
                header("Location: login.php?signup=success");
                exit();
            } else {
                $error = "Signup failed, try again!";
            }
        }
    }
}
?>

<div class="container mt-5">
    <h2 class="text-center">Sign Up</h2>

    <?php if(isset($error)) echo "<div class='alert alert-danger'>$error</div>"; ?>

    <form method="POST" class="mt-4">

        <input type="text" name="name" placeholder="Name" class="form-control mb-2" required>

        <input type="email" name="email" placeholder="Email" class="form-control mb-2" required>

        <input type="password" name="password" placeholder="Password" class="form-control mb-2" required>

        <input type="text" name="phone" placeholder="Phone" class="form-control mb-2">

        <input type="text" name="address" placeholder="Address" class="form-control mb-2">

        <input type="text" name="city" placeholder="City" class="form-control mb-2">

        <input type="text" name="country" placeholder="Country" class="form-control mb-2">

        <button type="submit" name="signup" class="btn btn-primary w-100">
            Sign Up
        </button>
    </form>

    <p class="mt-3 text-center">
        Already have an account? <a href="login.php">Login here</a>
    </p>
</div>

<?php require("includes/footer.php"); ?>s