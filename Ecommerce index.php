<?php
session_start();
$products = [
    1 => ['name' => 'T-Shirt', 'price' => 20],
    2 => ['name' => 'Jeans', 'price' => 40],
    3 => ['name' => 'Jacket', 'price' => 60],
];

// Add product to cart
if (isset($_GET['add_to_cart'])) {
    $_SESSION['cart'][] = $_GET['add_to_cart'];
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Store</title>
</head>
<body>
    <h2>Products</h2>
    <?php foreach ($products as $id => $product): ?>
        <p><?= $product['name'] ?> - $<?= $product['price'] ?> 
            <a href="?add_to_cart=<?= $id ?>">Add to Cart</a>
        </p>
    <?php endforeach; ?>
    <a href="Ecommerce cart.php">Go to Cart</a>
</body>
</html>
