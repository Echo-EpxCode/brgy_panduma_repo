<?php
session_start();
require "config.php";

$message = "";

if (isset($_POST['login'])) {

    $email    = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE email='$email' LIMIT 1";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {

        $user = mysqli_fetch_assoc($result);

        if (password_verify($password, $user['password'])) {

            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];

            header("Location: dashboard.php");
            exit();

        } else {
            $message = "Invalid password!";
        }

    } else {
        $message = "User not found!";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen" style="background: linear-gradient(to right, #0ea5e9, #0369a1);">

<div class="bg-white p-8 rounded-xl shadow-lg w-97">
    <h2 class="text-3xl font-bold text-center">BARANGAY PANDUMA</h2>
    <hr>
    <h2 class="text-2xl font-bold mb-6 text-center">LOGIN</h2>

    <?php if ($message): ?>
        <div class="mb-4 text-sm text-red-500"><?= $message ?></div>
    <?php endif; ?>

    <form method="POST">
        <input type="email" name="email" placeholder="Email"
            class="w-full mb-3 p-2 border rounded" required>

        <input type="password" name="password" placeholder="Password"
            class="w-full mb-4 p-2 border rounded" required>

        <button type="submit" name="login"
            class="w-full bg-green-600 text-white p-2 rounded hover:bg-green-700">
            Login
        </button>
    </form>

    <p class="mt-4 text-sm text-center">
        Don't have an account? 
        <a href="register.php" class="text-green-600">Register</a>
    </p>
</div>

</body>
</html>
