<?php
// products.php
require 'db.php';

$sql = "SELECT * FROM products";
$stmt = $pdo->query($sql);
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Available Products - Ebook Store</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet"> <!-- Include Tailwind CSS -->
</head>
<body class="bg-gray-100">
    <header class="bg-blue-600 text-white p-6 text-center">
        <h1 class="text-3xl font-bold">Ebook Store</h1>
        <nav class="mt-4">
            <a href="index.php" class="text-white hover:underline">Home</a>
            <span class="mx-2">|</span>
            <a href="add_product.php" class="text-white hover:underline">Add Product</a>
            <span class="mx-2">|</span>
            <a href="products.php" class="text-white hover:underline">View Products</a>
        </nav>
    </header>

    <main class="container mx-auto p-6">
        <h2 class="text-2xl font-semibold mb-4">Available Products</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php foreach ($products as $product): ?>
                <div class="bg-white rounded-lg shadow-lg p-4">
                    <h3 class="text-lg font-semibold"><?php echo htmlspecialchars($product['title']); ?></h3>
                    <p class="text-gray-600">Author: <?php echo htmlspecialchars($product['author']); ?></p>
                    <p class="text-gray-800 mt-2"><?php echo htmlspecialchars($product['description']); ?></p>
                    <p class="text-xl font-bold mt-2">Price: $<?php echo htmlspecialchars($product['price']); ?></p>
                    <a href="purchase.php?product_id=<?php echo $product['product_id']; ?>" class="mt-4 inline-block bg-blue-600 text-white rounded-lg px-4 py-2 hover:bg-blue-700 transition">Buy Now</a>
                </div>
            <?php endforeach; ?>
        </div>
    </main>

    <footer class="bg-blue-600 text-white text-center p-4 mt-6">
        <p>&copy; <?php echo date("Y"); ?> Ebook Store. All rights reserved.</p>
    </footer>
</body>
</html>
