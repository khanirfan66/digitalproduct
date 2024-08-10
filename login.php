<?php
// login.php
require 'db.php';

session_start(); // Start a session to manage user login state

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check if the username exists
    $sql = "SELECT * FROM users WHERE username = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$username]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        // Password is correct, set session variables
        $_SESSION['user_id'] = $user['user_id'];
        $_SESSION['username'] = $user['username'];
        header("Location: index.php"); // Redirect to homepage after successful login
        exit();
    } else {
        $errorMessage = "Error: Invalid username or password.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Ebook Store</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet"> <!-- Include Tailwind CSS -->
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-6">
        <h2 class="text-3xl font-bold text-center mb-6 text-blue-600">Login to Your Account</h2>

        <?php if (isset($errorMessage)): ?>
            <div class="bg-red-500 text-white p-4 rounded mb-4">
                <?php echo htmlspecialchars($errorMessage); ?>
            </div>
        <?php endif; ?>

        <form method="POST" action="login.php" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="username">Username</label>
                <input type="text" name="username" placeholder="Username" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" />
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="password">Password</label>
                <input type="password" name="password" placeholder="Password" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" />
            </div>
            <div class="flex items-center justify-between">
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Login</button>
            </div>
        </form>
        <p class="text-center">
            Don't have an account? <a href="register.php" class="text-blue-600 hover:underline">Sign up here</a>
        </p>
        <p class="text-center">
            <a href="index.php" class="text-blue-600 hover:underline">Back to Home</a>
        </p>
    </div>
</body>
</html>
