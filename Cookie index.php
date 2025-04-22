<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login with Session and Cookie</title>
</head>
<body>
    <?php if(isset($_SESSION['id'])): ?>
        <h2>Welcome, <?php echo $_SESSION['username']; ?> </h2>
        <a href="Cookie logout.php">Logout</a>
    <?php else: ?>
        <h2>Login form </h2>
        <?php
            if(isset($_SESSION['error']))
            {
                echo "<p style = 'color: red;'>".$_SESSION['error']."</p>";
                unset($_SESSION['error']);
            }
        ?>

        <form method="POST", action="Cookie login.php">
            Username: <input type="text", name="username", placeholder="Enter name" required value="<?php echo $_COOKIE['username'] ?? ''; ?>"><br><br>
            Password: <input type="password" name="password" required value="<?php echo $_COOKIE['password'] ?? ''; ?>"><br><br>
            <input type="checkbox" name="remember" <?php echo isset($_COOKIE['username']) ? 'checked' : ''; ?>> Remember Me<br><br>
            <input type="submit" name="login" value="Login">
        </form>
    <?php endif; ?>
</body>
</html>