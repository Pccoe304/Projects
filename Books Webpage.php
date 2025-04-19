<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "library";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM books";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Catalogue</title>
</head>
<body>
    <h2>Book Catalogue</h2>
    <table border="1">
        <tr>
            <th>Title</th>
            <th>Author</th>
            <th>Genre</th>
            <th>Price</th>
        </tr>

        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . $row["title"] . "</td>
                        <td>" . $row["author"] . "</td>
                        <td>" . $row["genre"] . "</td>
                        <td>" . $row["price"] . "</td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='4'>No books available</td></tr>";
        }
        $conn->close();
        ?>
    </table>
</body>
</html>



<!-- CREATE DATABASE library;

USE library;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50),
    email VARCHAR(100),
    password VARCHAR(255)
);

CREATE TABLE books (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(100),
    author VARCHAR(100),
    genre VARCHAR(50),
    price DECIMAL(5,2)
); -->



<!-- INSERT INTO books (title, author, genre, price) VALUES 
('The Great Gatsby', 'F. Scott Fitzgerald', 'Novel', 10.99),
('To Kill a Mockingbird', 'Harper Lee', 'Fiction', 8.99),
('1984', 'George Orwell', 'Dystopian', 12.49); -->
