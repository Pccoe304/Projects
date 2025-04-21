<?php
session_start();
$products = [
    1 => ['name' => 'T-Shirt', 'price' => 20],
    2 => ['name' => 'Jeans', 'price' => 40],
    3 => ['name' => 'Jacket', 'price' => 60],
];

$cart = $_SESSION['cart'] ?? [];
$total = 0;

?>

<!DOCTYPE html>
<html>
<head>
    <title>Your Cart</title>
</head>
<body>
    <h2>Your Cart</h2>
    <?php foreach ($cart as $id): ?>
        <p><?= $products[$id]['name'] ?> - $<?= $products[$id]['price'] ?></p>
        <?php $total += $products[$id]['price']; ?>
    <?php endforeach; ?>
    <p>Total: $<?= $total ?></p>
    <a href="Ecommerce checkout.php">Proceed to Checkout</a>
</body>
</html>
