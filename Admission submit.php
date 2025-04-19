<?php
$conn = new mysqli("localhost", "root", "Savi#15@Mrunal", "college_admission_db");

if ($conn->connect_error) {
    die("Connection failed!");
}

$name = $_POST['student_name'];
$course = $_POST['course'];
$email = $_POST['email'];

$sql = "INSERT INTO admissions (student_name, course, email)
        VALUES ('$name', '$course', '$email')";

if ($conn->query($sql)) {
    echo "Admission submitted successfully!<br><a href='index.html'>Go Back</a>";
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
?>


<!-- CREATE DATABASE college_admission_db;

USE college_admission_db;

CREATE TABLE admissions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    student_name VARCHAR(100),
    course VARCHAR(100),
    email VARCHAR(100)
); -->
