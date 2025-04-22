<?php
$conn = new mysqli('localhost', 'root', 'Savi#15@Mrunal', 'cookie');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
