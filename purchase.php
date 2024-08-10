<?php
// purchase.php
require 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $product_id = $_GET['product_id'];
    // Assume user is logged in and we have user_id
    $user_id = 1; // Replace with actual user ID from session or authentication

    $sql = "INSERT INTO orders (user_id, product_id) VALUES (?, ?)";
    $stmt = $pdo->prepare($sql);

    if ($stmt->execute([$user_id, $product_id])) {
        header("Location: payment.php?order_id=" . $pdo->lastInsertId());
        exit();
    } else {
        echo "Error: Could not place order.";
    }
}
?>
