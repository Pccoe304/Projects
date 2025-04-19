<?php
$conn = new mysqli("localhost", "root", "Savi#15@Mrunal", "pharmacy_db");

$result = $conn->query("SELECT * FROM medicines");

echo "<h2>Available Medicines</h2>";

while($row = $result->fetch_assoc()) {
    echo "<b>Name:</b> " . $row['medicine_name'] . "<br>";
    echo "<b>Quantity:</b> " . $row['quantity'] . "<br>";
    echo "<b>Price:</b> ₹" . $row['price'] . "<hr>";
}

$conn->close();
?>
