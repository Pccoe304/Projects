<?php
$conn = new mysqli("localhost", "root", "Savi#15@Mrunal", "pharmacy_db");

if ($conn->connect_error) {
    die("Connection failed!");
}

$page = $_GET['page'] ?? 'form';

// Form submit handling
if ($_SERVER['REQUEST_METHOD'] === 'POST' && $page === 'form') {
    $name = $_POST['medicine_name'];
    $qty = $_POST['quantity'];
    $price = $_POST['price'];

    $sql = "INSERT INTO medicines (medicine_name, quantity, price)
            VALUES ('$name', '$qty', '$price')";

    if ($conn->query($sql)) {
        header("Location: ?page=view");
        exit;
    } else {
        $error = "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Pharmacy Management</title>
</head>
<body>

<?php if ($page === 'form'): ?>
    <h2>Medicine Entry</h2>
    <form method="post" action="?page=form">
        Medicine Name: <input type="text" name="medicine_name" required><br><br>
        Quantity: <input type="number" name="quantity" required><br><br>
        Price: <input type="number" step="0.01" name="price" required><br><br>
        <input type="submit" value="Add Medicine">
    </form>
    <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
    <br>
    <a href="?page=view">View Medicines</a>

<?php elseif ($page === 'view'): ?>
    <h2>Available Medicines</h2>
    <?php
    $result = $conn->query("SELECT * FROM medicines");
    while ($row = $result->fetch_assoc()) {
        echo "<b>Name:</b> " . $row['medicine_name'] . "<br>";
        echo "<b>Quantity:</b> " . $row['quantity'] . "<br>";
        echo "<b>Price:</b> ₹" . $row['price'] . "<hr>";
    }
    ?>
    <br>
    <a href="?page=form">Add New Medicine</a>
<?php endif; ?>

</body>
</html>





<!-- 
CREATE DATABASE pharmacy_db;

USE pharmacy_db;

CREATE TABLE medicines (
    id INT AUTO_INCREMENT PRIMARY KEY,
    medicine_name VARCHAR(100),
    quantity INT,
    price DECIMAL(10,2)
);
 -->

