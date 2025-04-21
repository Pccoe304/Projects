<?php
$conn = new mysqli("localhost", "root", "Savi#15@Mrunal", "flight_db");

$result = $conn->query("SELECT * FROM bookings");

echo "<h2>All Bookings</h2>";

while($row = $result->fetch_assoc()) {
    echo "<b>Name:</b> " . $row['name'] . "<br>";
    echo "<b>Email:</b> " . $row['email'] . "<br>";
    echo "<b>Flight:</b> " . $row['flight'] . "<hr>";
}

$conn->close();
?>
