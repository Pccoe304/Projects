<?php
$conn = new mysqli("localhost", "root", "Savi#15@Mrunal", "toll_tax_db");

if ($conn->connect_error) {
    die("Connection failed!");
}

$vehicle_number = $_POST['vehicle_number'];
$vehicle_type = $_POST['vehicle_type'];
$toll_amount = $_POST['toll_amount'];

$sql = "INSERT INTO toll_entries (vehicle_number, vehicle_type, toll_amount) 
        VALUES ('$vehicle_number', '$vehicle_type', '$toll_amount')";

if ($conn->query($sql)) {
    echo "Toll entry submitted successfully!<br><a href='index.html'>Go Back</a>";
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
?>


<!-- CREATE DATABASE toll_tax_db;

USE toll_tax_db;

CREATE TABLE toll_entries (
    id INT AUTO_INCREMENT PRIMARY KEY,
    vehicle_number VARCHAR(20),
    vehicle_type VARCHAR(50),
    toll_amount DECIMAL(10,2)
); -->
