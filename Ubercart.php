<?php
$conn = new mysqli("localhost", "root", "", "ubercart");
if (isset($_POST['add'])) {
    $name = $_POST['pname'];
    $price = $_POST['price'];
    $conn->query("INSERT INTO products (name, price) VALUES ('$name', '$price')");
}
?>
<!DOCTYPE html>
<html>
<body>
<h2>Ubercart - Simple eCommerce</h2>

<form method="post">
    <input name="pname" placeholder="Product Name" required>
    <input name="price" placeholder="Price" required>
    <button name="add">Add Product</button>
</form>

<h3>Available Products:</h3>
<?php
$res = $conn->query("SELECT * FROM products");
while ($row = $res->fetch_assoc())
    echo "<p>{$row['name']} - ₹{$row['price']}</p>";
?>
</body>
</html>



<!-- CREATE DATABASE ubercart;
USE ubercart;

CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50),
    price INT
); -->
