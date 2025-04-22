<?php
    $conn = new mysqli('localhost', 'root', 'Savi#15@Mrunal', 'cookie');

    if($conn->connect_error)
    {
        echo "Failed to connect MySQL: ".$conn->connect_error;
    }
?>



<!-- 
CREATE DATABASE cookie;

USE cookie;

CREATE TABLE user (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(100),
    password VARCHAR(100)
);
 -->
