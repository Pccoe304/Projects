<?php
    session_start();
    if(!isset($_SESSION["id"]) || trim($_SESSION["id"]) == "")
    {
        header("Location: Session Form.php");
        exit();
    }
    include("Session Connection.php");

    $query = mysqli_query($conn, "SELECT * FROM user WHERE id='".$_SESSION["id"]."'");
    $row = mysqli_fetch_assoc($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Setting up Cookie on User Login</title>
</head>
<body>
    <h2>Login Success</h2>
    <?php
        echo $row["username"];
    ?><br>
    <a href="Session Logout.php">Logout</a>
</body>
</html>