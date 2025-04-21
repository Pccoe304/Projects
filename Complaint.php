<?php
$conn = new mysqli("localhost", "root", "Savi#15@Mrunal", "complaint_db");

if ($conn->connect_error) {
    die("Connection failed!");
}

$page = $_GET['page'] ?? 'form';

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && $page === 'form') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    $sql = "INSERT INTO complaints (name, email, message) VALUES ('$name', '$email', '$message')";

    if ($conn->query($sql)) {
        header("Location: ?page=view");
        exit;
    } else {
        $error = "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Complaint System</title>
</head>
<body>

<?php if ($page === 'form'): ?>
    <h2>Complaint Form</h2>
    <form method="post" action="?page=form">
        Name: <input type="text" name="name" required><br><br>
        Email: <input type="email" name="email" required><br><br>
        Message:<br>
        <textarea name="message" placeholder="Type here..." rows="4" cols="30" required></textarea><br><br>
        <input type="submit" value="Submit Complaint">
    </form>
    <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
    <br>
    <a href="?page=view">View Complaints</a>

<?php elseif ($page === 'view'): ?>
    <h2>All Complaints</h2>
    <?php
    $result = $conn->query("SELECT * FROM complaints");
    while ($row = $result->fetch_assoc()) {
        echo "<b>Name:</b> " . htmlspecialchars($row['name']) . "<br>";
        echo "<b>Email:</b> " . htmlspecialchars($row['email']) . "<br>";
        echo "<b>Message:</b> " . nl2br(htmlspecialchars($row['message'])) . "<hr>";
    }
    ?>
    <br>
    <a href="?page=form">Submit Another Complaint</a>
<?php endif; ?>

</body>
</html>


<!-- 
CREATE DATABASE complaint_db;
USE complaint_db;

CREATE TABLE complaints (
    name VARCHAR(100),
    email VARCHAR(100),
    message TEXT
); 
-->
