<?php
// register.php
require 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Check if the username already exists
    $checkSql = "SELECT * FROM users WHERE username = ?";
    $checkStmt = $pdo->prepare($checkSql);
    $checkStmt->execute([$username]);
    $existingUser = $checkStmt->fetch();

    if ($existingUser) {
        $errorMessage = "Error: Username already exists. Please choose a different username.";
    } else {
        $sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
        $stmt = $pdo->prepare($sql);

        if ($stmt->execute([$username, $email, $password])) {
            $successMessage = "Registration successful! You can now log in.";
            header("Location: index.php"); // Redirect to home page after successful registration
            exit();
        } else {
            $errorMessage = "Error: Could not register user.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Ebook Store</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet"> <!-- Include Tailwind CSS -->
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-6">
        <h2 class="text-3xl font-bold text-center mb-6 text-blue-600">Create Your Account</h2>

        <?php if (isset($errorMessage)): ?>
            <div class="bg-red-500 text-white p-4 rounded mb-4">
                <?php echo htmlspecialchars($errorMessage); ?>
            </div>
        <?php endif; ?>

        <?php if (isset($successMessage)): ?>
            <div class="bg-green-500 text-white p-4 rounded mb-4">
                <?php echo htmlspecialchars($successMessage); ?>
            </div>
        <?php endif; ?>

        <form method="POST" action="register.php" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="username">Username</label>
                <input type="text" name="username" placeholder="Username" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" />
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="email">Email</label>
                <input type="email" name="email" placeholder="Email" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" />
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="password">Password</label>
                <input type="password" name="password" placeholder="Password" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" />
            </div>
            <div class="flex items-center justify-between">
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Register</button>
            </div>
        </form>
        <p class="text-center">
            Already have an account? <a href="login.php" class="text-blue-600 hover:underline">Log in here</a>
        </p>
        <p class="text-center">
            <a href="index.php" class="text-blue-600 hover:underline">Back to Home</a>
        </p>
    </div>
</body>
</html>
