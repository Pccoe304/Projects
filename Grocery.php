<?php
$conn = new mysqli("localhost", "root", "Savi#15@Mrunal", "grocery");
if (isset($_POST['add'])) {
    $item = $_POST['item'];
    $price = $_POST['price'];
    $conn->query("INSERT INTO products (name, price) VALUES ('$item', '$price')");
}
?>


<!DOCTYPE html>
<html>
<body>
<h2>Grocery Store</h2>

<form method="post">
    <input name="item" placeholder="Item Name" required>
    <input name="price" placeholder="Price" required>
    <button name="add">Add</button>
</form>

<h3>Available Items:</h3>
<?php
$res = $conn->query("SELECT * FROM products");
while ($row = $res->fetch_assoc())
    echo "<p>{$row['name']} - ₹{$row['price']}</p>";
?>
</body>
</html>





<!-- CREATE DATABASE grocery;
USE grocery;

CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50),
    price INT
); -->
