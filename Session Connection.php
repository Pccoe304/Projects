<?php
    $conn = mysqli_connect('localhost', 'root', 'Savi#15@Mrunal', 'cookie');

    if(mysqli_connect_errno())
    {
        echo "Failed to connect MySQL: ".mysqli_connect_error();
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
