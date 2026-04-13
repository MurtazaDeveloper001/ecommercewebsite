<?php
require("includes/header.php");
require("includes/navbar.php");
require("config.php"); // yahan database connection
session_start();

if(isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $result = $conn->query("SELECT * FROM users WHERE email='$email'");
    if($result->num_rows > 0){
        $user = $result->fetch_assoc();
        if(password_verify($password, $user['password'])){
            $_SESSION['user_id'] = $user['user_id'];
            $_SESSION['name'] = $user['name'];
            header("Location: index.php"); // login ke baad home page
            exit();
        } else {
            $error = "Invalid password!";
        }
    } else {
        $error = "Email not registered!";
    }
}
?>

<div class="container mt-5">
    <h2 class="text-center">Login</h2>

    <?php if(isset($error)) echo "<div class='alert alert-danger'>$error</div>"; ?>

    <form method="POST" class="mt-4">
        <input type="email" name="email" placeholder="Email" class="form-control mb-2" required>
        <input type="password" name="password" placeholder="Password" class="form-control mb-2" required>
        <button type="submit" name="login" class="btn btn-primary">Login</button>
    </form>

    <p class="mt-3">Don't have an account? <a href="signup.php">Sign Up here</a></p>
</div>

<?php require("includes/footer.php"); ?>