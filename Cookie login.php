<?php
    session_start();

    include 'Cookie db.php';

    if(isset($_POST['login']))
    {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $sql = $conn->query("SELECT * FROM user where username='$username' AND password='$password'");

        if($sql->num_rows >0)
        {
            $row = $sql->fetch_assoc();

            $_SESSION['id'] = $row['id'];
            $_SESSION['username'] = $row['username'];

            if(isset($_POST['remember']))
            {
                setcookie("username", "$username", time() + (86400*30), "/");
                setcookie("password", "$password", time() + (86400*30), "/");
            }
            
            header("Location: Cookie index.php");
            exit();
        }
        else
        {
            $_SESSION['error'] = "Invalid username or password";
            header("Location: Cookie index.php");
            exit();
        }
    }
?>