<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Simple welcome quotes
$quotes = [
    "Serving the community with integrity and unity.",
    "Stronger together, building a better Barangay Panduma.",
    "Public service is a responsibility, not a privilege.",
    "Unity, transparency, and progress for all.",
    "Your voice matters in Barangay Panduma."
];

// Pick random quote
$randomQuote = $quotes[array_rand($quotes)];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Barangay Panduma - Welcome</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen flex flex-col" style="background-image: url('brgy_panduma.png');">

    <!-- Header -->
    <header class="text-white py-6 shadow" style="background: linear-gradient(to right, #0a36ca, #0369a1);">
        <div class="container mx-auto text-center">
            <h1 class="text-3xl font-bold">
                Barangay Panduma
            </h1>
            <p class="text-sm mt-1">
                Official Barangay Management System
            </p>
        </div>
    </header>

    <!-- Main Content -->
    <main class="flex-grow flex items-center justify-center px-4">
        <div class="bg-white shadow-lg rounded-xl p-10 text-center max-w-xl w-full">

            <h2 class="text-2xl font-semibold text-gray-700 mb-4">
                Welcome, <?php echo $_SESSION['username']; ?>!
            </h2>

            <p class="text-gray-600 italic mb-6">
                "<?php echo $randomQuote; ?>"
            </p>

            <div class="border-t pt-4 text-sm text-gray-500">
                We are committed to providing transparent, efficient, and reliable service to every resident of Barangay Panduma.
            </div>

            <div class="mt-6">
                <a href="logout.php"
                   class="bg-red-600 text-white px-5 py-2 rounded-lg hover:bg-red-700 transition">
                    Logout
                </a>
            </div>

        </div>
    </main>


</body>
</html>
