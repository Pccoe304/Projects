<?php
$conn = new mysqli("localhost", "root", "Savi#15@Mrunal", "complaint_db");

if ($conn->connect_error) {
    die("Connection failed!");
}

$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];

$sql = "INSERT INTO complaints (name, email, message) VALUES ('$name', '$email', '$message')";

if ($conn->query($sql)) {
    echo "Complaint submitted successfully!<br><a href='Complaint index.html'>Go Back</a>";
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
?>










<!-- CREATE DATABASE complaint_db;

USE complaint_db;

CREATE TABLE complaints (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    email VARCHAR(100),
    message TEXT
); -->
