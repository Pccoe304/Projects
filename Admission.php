<?php
$conn = new mysqli("localhost", "root", "Savi#15@Mrunal", "college_admission_db");

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['student_name'];
    $course = $_POST['course'];
    $email = $_POST['email'];

    $sql = "INSERT INTO admissions (student_name, course, email) VALUES ('$name', '$course', '$email')";
    
    if ($conn->query($sql)) {
        $message = "Admission submitted successfully!";
    } else {
        $message = "Error: " . $conn->error;
    }
}

// Fetch all admissions
$result = $conn->query("SELECT * FROM admissions");

// Set page view
$page = $_GET['page'] ?? 'form';
?>

<!DOCTYPE html>
<html>
<head>
    <title>College Admission</title>
</head>
<body>

<?php if ($page === 'form'): ?>
    <h2>Admission Form</h2>
    <form method="post">
        Student Name: <input type="text" name="student_name" required><br><br>
        Course: <input type="text" name="course" required><br><br>
        Email: <input type="email" name="email" required><br><br>
        <input type="submit" value="Submit Admission">
    </form>

    <?php if (isset($message)): ?>
        <h3><?= $message ?></h3>
    <?php endif; ?>

    <br>
    <a href="?page=view">View Admissions</a>

<?php elseif ($page === 'view'): ?>
    <h2>Admission List</h2>
    <?php if ($result->num_rows > 0): ?>
        <?php while($row = $result->fetch_assoc()): ?>
            <b>Name:</b> <?= $row['student_name'] ?><br>
            <b>Course:</b> <?= $row['course'] ?><br>
            <b>Email:</b> <?= $row['email'] ?><hr>
        <?php endwhile; ?>
    <?php else: ?>
        <p>No admissions found</p>
    <?php endif; ?>
    
    <br>
    <a href="?page=form">Back to Admission Form</a>

<?php endif; ?>

</body>
</html>

<?php $conn->close(); ?>




<!-- 
CREATE DATABASE college_admission_db;

USE college_admission_db;

CREATE TABLE admissions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    student_name VARCHAR(100),
    course VARCHAR(100),
    email VARCHAR(100)
); 
-->
