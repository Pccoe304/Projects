<?php
$conn = new mysqli("localhost", "root", "Savi#15@Mrunal", "grocery_store");
if ($conn->connect_error) die("Connection failed");
?>


<!-- CREATE DATABASE grocery_store;
USE grocery_store;

CREATE TABLE products (
  id INT PRIMARY KEY AUTO_INCREMENT,
  name VARCHAR(50),
  price DECIMAL(10,2)
);

INSERT INTO products (name, price) VALUES 
('Rice', 40),
('Wheat', 35),
('Milk', 25),
('Eggs', 60); -->
