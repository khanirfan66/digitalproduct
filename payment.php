<?php
// payment.php
require 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $order_id = $_GET['order_id'];
    // Assume payment is processed successfully
    $amount = 10.00; // Replace with actual order amount
    $payment_method = 'paypal'; // Example payment method

    $sql = "INSERT INTO payments (order_id, amount, payment_method) VALUES (?, ?, ?)";
    $stmt = $pdo->prepare($sql);

    if ($stmt->execute([$order_id, $amount, $payment_method])) {
        // Update order status
        $sql = "UPDATE orders SET status = 'completed' WHERE order_id = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$order_id]);

        echo "Payment successful! Thank you for your purchase.";
    } else {
        echo "Error: Could not process payment.";
    }
}
?>
