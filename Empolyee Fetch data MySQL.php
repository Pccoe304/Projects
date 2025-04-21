<?php
$conn = new mysqli("localhost", "root", "Savi#15@Mrunal", "registration");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $pass = $_POST['pass'];

    $sql = "INSERT INTO student (fname, lname, pass) VALUES ('$fname', '$lname', '$pass')";
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully.<br><br>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$result = $conn->query("SELECT * FROM student");

echo "<h2>All Students</h2>";

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<b>Student ID:</b> " . $row['id'] . "<br>";
        echo "<b>First Name:</b> " . $row['fname'] . "<br>";
        echo "<b>Last Name:</b> " . $row['lname'] . "<br>";
        echo "<b>Password:</b> " . $row['pass'] . "<br><hr>";
    }
} else {
    echo "No records found.";
}

$conn->close();
?>
