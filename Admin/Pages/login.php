<?php
session_start();
require("config.php");

if(isset($_POST['login'])) {

    $email = trim($_POST['email']);
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT id, name, email, password FROM users WHERE email=?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if($result->num_rows == 1){

        $user = $result->fetch_assoc();

        if(password_verify($password, $user['password'])){

            $_SESSION['user_id'] = $user['id'];
            $_SESSION['name'] = $user['name'];

            header("Location: index.php");
            exit();

        } else {
            $error = "Invalid password!";
        }

    } else {
        $error = "Email not registered!";
    }
}
?>

<?php require("includes/header.php"); ?>
<?php require("includes/navbar.php"); ?>

<div class="container mt-5">
    <h2 class="text-center">Login</h2>

    <?php if(isset($error)) echo "<div class='alert alert-danger'>$error</div>"; ?>

    <form method="POST" class="mt-4">

        <input type="email" name="email" placeholder="Email" class="form-control mb-2" required>

        <input type="password" name="password" placeholder="Password" class="form-control mb-2" required>

        <button type="submit" name="login" class="btn btn-primary w-100">Login</button>

    </form>

    <p class="mt-3 text-center">
        Don't have an account? <a href="register.php">Sign Up here</a>
    </p>
</div>

<?php require("includes/footer.php"); ?>