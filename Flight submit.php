<?php
$conn = new mysqli("localhost", "root", "Savi#15@Mrunal", "flight_db");

if ($conn->connect_error) {
    die("Connection failed!");
}

$name = $_POST['name'];
$email = $_POST['email'];
$flight = $_POST['flight'];

$sql = "INSERT INTO bookings (name, email, flight) VALUES ('$name', '$email', '$flight')";

if ($conn->query($sql)) {
    echo "Flight booked successfully!<br><a href='Flight index.html'>Go Back</a>";
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
?>








<!-- 
CREATE DATABASE flight_db;

USE flight_db;

CREATE TABLE bookings (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    email VARCHAR(100),
    flight VARCHAR(100)
);
 -->

