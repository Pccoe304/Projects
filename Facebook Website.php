<?php
$conn = new mysqli("localhost", "root", "Savi#15@Mrunal", "fb_clone");
session_start();

if (isset($_POST['login'])) {
    $_SESSION['user'] = $_POST['username'];
}
if (isset($_POST['post'])) {
    $user = $_SESSION['user'];
    $text = $_POST['text'];
    $conn->query("INSERT INTO posts (user, content) VALUES ('$user', '$text')");
}
if (isset($_POST['logout'])) {
    session_destroy();
    header("Location: ".$_SERVER['PHP_SELF']);
    exit();
}
?>
<!DOCTYPE html>
<html>
<body>

<?php if (!isset($_SESSION['user'])): ?>
    <form method="post">
        <input name="username" placeholder="Enter name"><br><br>
        <button name="login">Login</button>
    </form>
<?php else: ?>
    <h3>Welcome <?= $_SESSION['user'] ?></h3>
    <form method="post">
        <textarea name="text" placeholder="Write something"></textarea><br>
        <button name="post">Post</button>
        <button name="logout">Logout</button>
    </form>
    <h4>New Feed:</h4>
    <?php
    $res = $conn->query("SELECT * FROM posts ORDER BY id DESC");
    while ($row = $res->fetch_assoc())
        echo "<p><b>{$row['user']}:</b> {$row['content']}</p>";
    ?>
<?php endif; ?>

</body>
</html>





<!-- CREATE DATABASE fb_clone;
USE fb_clone;

CREATE TABLE posts (
  id INT AUTO_INCREMENT PRIMARY KEY,
  user VARCHAR(50),
  content TEXT
); -->
