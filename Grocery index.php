<?php
session_start();
include "Grocery db.php";
$result = $conn->query("SELECT * FROM products");

if (isset($_GET['add'])) 
{
    $_SESSION['cart'][] = $_GET['add'];
}
?>

<h2>Grocery Store</h2>
<?php while($row = $result->fetch_assoc()): ?>
    <p>
        <?= $row['name'] ?> - ₹<?= $row['price'] ?>
        <a href="?add=<?= $row['id'] ?>">Add to Cart</a>
    </p>
<?php endwhile; ?>

<a href="Grocery cart.php">🛒 View Cart</a>
