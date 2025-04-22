<?php
$conn = new mysqli("localhost", "root", "Savi#15@Mrunal", "pharmacy_db");

if ($conn->connect_error) {
    die("Connection failed!");
}

$name = $_POST['medicine_name'];
$qty = $_POST['quantity'];
$price = $_POST['price'];

$sql = "INSERT INTO medicines (medicine_name, quantity, price)
        VALUES ('$name', '$qty', '$price')";

if ($conn->query($sql)) {
    echo "Medicine added successfully!<br><a href='index.html'>Go Back</a>";
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
?>





<!-- CREATE DATABASE pharmacy_db;

USE pharmacy_db;

CREATE TABLE medicines (
    id INT AUTO_INCREMENT PRIMARY KEY,
    medicine_name VARCHAR(100),
    quantity INT,
    price DECIMAL(10,2)
);
 -->
