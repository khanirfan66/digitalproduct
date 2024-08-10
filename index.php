<?php
// index.php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ebook Store</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet"> <!-- Include Tailwind CSS -->
</head>
<body class="bg-gray-100">
    <header class="bg-blue-600 text-white p-6 text-center">
        <h1 class="text-4xl font-bold">Welcome to the Ebook Store</h1>
    </header>

    <nav class="bg-white shadow-md">
        <div class="container mx-auto p-4">
            <ul class="flex space-x-4">
                <li><a href="register.php" class="text-blue-600 hover:underline">Register</a></li>
                <li><a href="add_product.php" class="text-blue-600 hover:underline">Add Product</a></li>
                <li><a href="products.php" class="text-blue-600 hover:underline">View Products</a></li>
            </ul>
        </div>
    </nav>

    <main class="container mx-auto p-6">
        <h2 class="text-2xl font-semibold mb-4">Explore Our Collection</h2>
        <p class="text-gray-700">Discover a wide range of ebooks across various genres. Whether you're looking for educational resources, fiction, or non-fiction, we have something for everyone.</p>
    </main>

    <footer class="bg-blue-600 text-white text-center p-4 mt-6">
        <p>&copy; <?php echo date("Y"); ?> Ebook Store. All rights reserved.</p>
    </footer>
</body>
</html>
