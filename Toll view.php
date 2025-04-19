<?php
$conn = new mysqli("localhost", "root", "Savi#15@Mrunal", "toll_tax_db");

$result = $conn->query("SELECT * FROM toll_entries");

echo "<h2>All Toll Entries</h2>";

while($row = $result->fetch_assoc()) {
    echo "<b>Vehicle Number:</b> " . $row['vehicle_number'] . "<br>";
    echo "<b>Vehicle Type:</b> " . $row['vehicle_type'] . "<br>";
    echo "<b>Toll Amount:</b> ₹" . $row['toll_amount'] . "<hr>";
}

$conn->close();
?>
