<?php
session_start();
$cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_SESSION['cart'] = [];  // Clear cart after order
    echo "<h2>Order Placed Successfully!</h2>";
    exit;
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Checkout</title>
</head>
<body>
    <h2>Checkout</h2>
    <form method="POST">
        <label>Name:</label>
        <input type="text" name="name" required><br>
        <label>Address:</label>
        <input type="text" name="address" required><br>
        <button type="submit">Place Order</button>
    </form>
</body>
</html>
