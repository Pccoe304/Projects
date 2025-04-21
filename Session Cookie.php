<?php
session_start();
$conn = mysqli_connect('localhost', 'root', 'Savi#15@Mrunal', 'cookie');

// Handle login
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $result = mysqli_query($conn, "SELECT * FROM user WHERE username='$username' AND password='$password'");
    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['id'] = $row['id'];
        $_SESSION['username'] = $row['username'];

        if (isset($_POST['remember'])) {
            setcookie("username", $username, time() + (86400 * 30), "/");
            setcookie("password", $password, time() + (86400 * 30), "/");
        }

        header("Location: Session Cookie.php");
        exit();
    } else {
        $error = "Invalid username or password.";
    }
}

// Handle logout
if (isset($_GET['logout'])) {
    session_destroy();
    setcookie("username", "", time() - 3600, "/");
    setcookie("password", "", time() - 3600, "/");
    header("Location: Session Cookie.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login with Session & Cookie</title>
</head>
<body>

<?php if (isset($_SESSION['id'])): ?>
    <h2>Welcome, <?php echo $_SESSION['username']; ?> 👋</h2>
    <a href="?logout=true">Logout</a>
<?php else: ?>
    <h2>Login Form</h2>
    <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>

    <form method="post" action="">
        <label>Username:</label><br>
        <input type="text" name="username" required value="<?php echo isset($_COOKIE['username']) ? $_COOKIE['username'] : ''; ?>"><br><br>

        <label>Password:</label><br>
        <input type="password" name="password" required value="<?php echo isset($_COOKIE['password']) ? $_COOKIE['password'] : ''; ?>"><br><br>

        <label><input type="checkbox" name="remember" <?php echo (isset($_COOKIE['username'])) ? 'checked' : ''; ?>> Remember Me</label><br><br>

        <input type="submit" name="login" value="Login">
    </form>
<?php endif; ?>

</body>
</html>











<!-- 
CREATE DATABASE cookie;

USE cookie;

CREATE TABLE user (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(100),
    password VARCHAR(100)
);
 -->

