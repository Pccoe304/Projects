<?php
$conn = new mysqli("localhost", "root", "Savi#15@Mrunal", "college_admission_db");

$result = $conn->query("SELECT * FROM admissions");

echo "<h2>Admission List</h2>";

while($row = $result->fetch_assoc()) {
    echo "<b>Name:</b> " . $row['student_name'] . "<br>";
    echo "<b>Course:</b> " . $row['course'] . "<br>";
    echo "<b>Email:</b> " . $row['email'] . "<hr>";
}

$conn->close();
?>
