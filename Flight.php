<?php
$conn = new mysqli("localhost", "root", "Savi#15@Mrunal", "flight_db");

if ($conn->connect_error) {
    die("Connection failed!");
}

$page = $_GET['page'] ?? 'form';

// Form submission handle
if ($_SERVER['REQUEST_METHOD'] === 'POST' && $page === 'form') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $flight = $_POST['flight'];

    $sql = "INSERT INTO bookings (name, email, flight) VALUES ('$name', '$email', '$flight')";

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
    <title>Flight Booking System</title>
</head>
<body>

<?php if ($page === 'form'): ?>
    <h2>Flight Booking Form</h2>
    <form method="post" action="?page=form">
        Name: <input type="text" name="name" required><br><br>
        Email: <input type="email" name="email" required><br><br>
        Flight:
        <select name="flight" required>
            <option value="Mumbai to Delhi">Mumbai to Delhi</option>
            <option value="Delhi to Bangalore">Delhi to Bangalore</option>
            <option value="Chennai to Kolkata">Chennai to Kolkata</option>
        </select><br><br>
        <input type="submit" value="Book Flight">
    </form>
    <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
    <br>
    <a href="?page=view">View Bookings</a>

<?php elseif ($page === 'view'): ?>
    <h2>All Bookings</h2>
    <?php
    $result = $conn->query("SELECT * FROM bookings");
    while ($row = $result->fetch_assoc()) {
        echo "<b>Name:</b> " . $row['name'] . "<br>";
        echo "<b>Email:</b> " . $row['email'] . "<br>";
        echo "<b>Flight:</b> " . $row['flight'] . "<hr>";
    }
    ?>
    <br>
    <a href="?page=form">Book Another Flight</a>
<?php endif; ?>

</body>
</html>






<!-- 
CREATE DATABASE flight_db;

USE flight_db;

CREATE TABLE bookings (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    email VARCHAR(100),
    flight VARCHAR(100)
);
 -->