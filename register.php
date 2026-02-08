<?php
session_start();
require "config.php";

$message = "";

if (isset($_POST['register'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email    = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password'];

    if (!empty($username) && !empty($email) && !empty($password)) {

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $query = "INSERT INTO users (username, email, password) 
                  VALUES ('$username', '$email', '$hashedPassword')";

        if (mysqli_query($conn, $query)) {
            $message = "Registration successful!";
        } else {
            $message = "Error: " . mysqli_error($conn);
        }
    } else {
        $message = "All fields are required!";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">

<div class="bg-white p-8 rounded-xl shadow-lg w-96">
<h2 class="text-3xl font-bold text-center">BARANGAY PANDUMA</h2>
    <hr>
    <h2 class="text-2xl font-bold mb-6 text-center">REGISTER</h2>

    <?php if ($message): ?>
        <div class="mb-4 text-sm text-red-500"><?= $message ?></div>
    <?php endif; ?>

    <form method="POST">
        <input type="text" name="username" placeholder="Username"
            class="w-full mb-3 p-2 border rounded" required>

        <input type="email" name="email" placeholder="Email"
            class="w-full mb-3 p-2 border rounded" required>

        <input type="password" name="password" placeholder="Password"
            class="w-full mb-3 p-2 border rounded" required>

        <button type="submit" name="register"
            class="w-full bg-blue-600 text-white p-2 rounded hover:bg-blue-700">
            Register
        </button>
    </form>

    <p class="mt-4 text-sm text-center">
        Already have an account? 
        <a href="index.php" class="text-blue-600">Login</a>
    </p>
</div>

</body>
</html>
