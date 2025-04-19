<?php
$conn = new mysqli("localhost", "root", "Savi#15@Mrunal", "complaint_db");

$result = $conn->query("SELECT * FROM complaints");

echo "<h2>All Complaints</h2>";

while($row = $result->fetch_assoc()) {
    echo "<b>Name:</b> " . $row['name'] . "<br>";
    echo "<b>Email:</b> " . $row['email'] . "<br>";
    echo "<b>Message:</b> " . $row['message'] . "<hr>";
}

$conn->close();
?>
