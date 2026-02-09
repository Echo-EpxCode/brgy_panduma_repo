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
<body class="min-h-screen bg-cover bg-center bg-no-repeat relative"
      style="background-image: url('brgy_panduma.png');">

    <!-- Overlay for readability -->
    <div class="absolute inset-0 bg-black/30 z-0"></div>

    <!-- Main Content -->
    <main class="relative z-10 flex items-center justify-center min-h-screen px-4">
        <div class="bg-white/90 backdrop-blur-md shadow-lg rounded-xl p-10 text-center max-w-xl w-full">

            <!-- Welcome Message -->
            <h2 class="text-3xl font-bold text-gray-800 mb-4">
                Welcome, <?= htmlspecialchars($_SESSION['username']); ?>!
            </h2>

            <!-- Random Quote -->
            <p class="text-gray-600 italic mb-6 text-lg">
                "<?= htmlspecialchars($randomQuote); ?>"
            </p>

            <!-- Description -->
            <div class="border-t pt-4 text-sm text-gray-500">
                We are committed to providing transparent, efficient, and reliable service to every resident of Barangay Panduma.
            </div>

            <!-- Logout Button -->
            <div class="mt-6">
                <a href="logout.php"
                   class="bg-red-600 hover:bg-red-700 text-white font-semibold py-2 px-6 rounded-lg transition">
                    Logout
                </a>
            </div>

        </div>
    </main>

</body>
</html>
