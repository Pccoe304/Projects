<?php
    $conn = mysqli_connect('localhost', 'root', 'Savi#15@Mrunal', 'cookie');

    if(mysqli_connect_errno())
    {
        echo "Failed to connect MySQL: ".mysqli_connect_error();
    }
?>