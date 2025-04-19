<?php
session_start();
include "db.php";

$cart = $_SESSION['cart'] ?? [];
$total = 0;

echo "<h2>Your Cart</h2>";
if (empty($cart)) {
    echo "Cart is empty.";
} else {
    foreach ($cart as $id) {
        $res = $conn->query("SELECT * FROM products WHERE id=$id")->fetch_assoc();
        echo "<p>{$res['name']} - ₹{$res['price']}</p>";
        $total += $res['price'];
    }
    echo "<p><strong>Total: ₹$total</strong></p>";
}
?>
<a href="index.php">← Back to Store</a>
