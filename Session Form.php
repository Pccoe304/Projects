<?php
    session_start();
    include('Session Connection.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Using Cookie with Logout</title>
</head>
<body>
    <h2>Login Form</h2>
    <form method="POST" action="Session Login.php">
        <label>Username: </label>
        <input type="text" 
            value="<?php 
                        if(isset($_COOKIE["username"]))
                        {
                            echo $_COOKIE["username"];
                        }
                    ?>"
            name="username"
        ><br><br>
        <label>Password: </label>
        <input type="text"
            value="<?php
                        if(isset($_COOKIE["password"]))
                        {
                            echo $_COOKIE["password"];
                        }
                    ?>"
            name="password"
        ><br><br>
        <input type="checkbox" name="remember"
                    <?php
                        if(isset($_COOKIE["username"]) && isset($_COOKIE["password"]))
                        {
                            echo "Checked";
                        }
                    ?>
        > Remember me <br><br>
        <input type="submit" name="login" value="Login">
    </form>

    <span>
        <?php
            if(isset($_SESSION["message"]))
            {
                echo $_SESSION["message"];
            }
            unset($_SESSION["message"]);
        ?>
    </span>
</body>
</html>