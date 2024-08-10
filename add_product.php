<?php
// add_product.php
require 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $author = $_POST['author'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $file_path = $_POST['file_path'];

    $sql = "INSERT INTO products (title, author, description, price, file_path) VALUES (?, ?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);

    if ($stmt->execute([$title, $author, $description, $price, $file_path])) {
        echo "<div class='bg-green-500 text-white p-4 rounded mb-4'>Product added successfully!</div>";
        header("Location: products.php");
        exit();
    } else {
        echo "<div class='bg-red-500 text-white p-4 rounded mb-4'>Error: Could not add product.</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product - Ebook Store</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet"> <!-- Include Tailwind CSS -->
</head>
<body class="bg-gray-100">
    <header class="bg-blue-600 text-white p-6 text-center">
        <h1 class="text-3xl font-bold">Ebook Store</h1>
        <nav class="mt-4">
            <a href="index.php" class="text-white hover:underline">Home</a>
            <span class="mx-2">|</span>
            <a href="products.php" class="text-white hover:underline">View Products</a>
        </nav>
    </header>

    <main class="container mx-auto p-6">
        <h2 class="text-2xl font-semibold mb-4">Add New Product</h2>
        <form method="POST" action="add_product.php" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="title">Title</label>
                <input type="text" name="title" placeholder="Title" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" />
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="author">Author</label>
                <input type="text" name="author" placeholder="Author" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" />
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="description">Description</label>
                <textarea name="description" placeholder="Description" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"></textarea>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="price">Price</label>
                <input type="number" step="0.01" name="price" placeholder="Price" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" />
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="file_path">File Path</label>
                <input type="text" name="file_path" placeholder="File Path" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" />
            </div>
            <div class="flex items-center justify-between">
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Add Product</button>
            </div>
        </form>
        <a href="products.php" class="text-blue-600 hover:underline">Back to Products</a>
    </main>

    <footer class="bg-blue-600 text-white text-center p-4 mt-6">
        <p>&copy; <?php echo date("Y"); ?> Ebook Store. All rights reserved.</p>
    </footer>
</body>
</html>
