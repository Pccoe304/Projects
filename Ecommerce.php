<?php
session_start();

// Sample products
$products = [
    1 => ['name' => 'T-Shirt', 'price' => 20],
    2 => ['name' => 'Jeans', 'price' => 40],
    3 => ['name' => 'Jacket', 'price' => 60],
];

// Initialize cart if not set
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Add to cart
if (isset($_GET['add_to_cart'])) {
    $_SESSION['cart'][] = $_GET['add_to_cart'];
    header("Location: ?page=store");
    exit;
}

$page = $_GET['page'] ?? 'store';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Simple Store</title>
</head>
<body>

<?php if ($page === 'store'): ?>
    <h2>Products</h2>
    <?php foreach ($products as $id => $product): ?>
        <p><?= $product['name'] ?> - $<?= $product['price'] ?> 
            <a href="?add_to_cart=<?= $id ?>">Add to Cart</a>
        </p>
    <?php endforeach; ?>

    <hr>
    <h2>Your Cart</h2>
    <?php if (count($_SESSION['cart']) == 0): ?>
        <p>Cart is empty</p>
    <?php else: ?>
        <?php
        $total = 0;
        foreach ($_SESSION['cart'] as $id):
            $total += $products[$id]['price'];
        ?>
            <p><?= $products[$id]['name'] ?> - $<?= $products[$id]['price'] ?></p>
        <?php endforeach; ?>
        <p><strong>Total: $<?= $total ?></strong></p>
        <a href="?page=checkout">Proceed to Checkout</a>
    <?php endif; ?>

<?php elseif ($page === 'checkout'): ?>
    <h2>Checkout</h2>
    <form method="POST" action="?page=confirm">
        <label>Name:</label>
        <input type="text" name="name" required><br><br>
        <label>Address:</label>
        <input type="text" name="address" required><br><br>
        <button type="submit">Place Order</button>
    </form>
    <br>
    <a href="?page=store">← Back to Store</a>

<?php elseif ($page === 'confirm' && $_SERVER['REQUEST_METHOD'] === 'POST'): ?>
    <?php
        $name = $_POST['name'];
        $address = $_POST['address'];
        $_SESSION['cart'] = []; // Clear cart
    ?>
    <h2>Order Placed Successfully!</h2>
    <p>Thank you, <strong><?= htmlspecialchars($name) ?></strong>!</p>
    <p>Your order will be shipped to: <strong><?= htmlspecialchars($address) ?></strong></p>
    <br>
    <a href="?page=store">Back to Store</a>

<?php endif; ?>

</body>
</html>
