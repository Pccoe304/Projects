<?php
    $con = mysqli_connect('localhost', 'root', 'Savi#15@Mrunal', 'registration');

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $pass = $_POST['pass'];

    $sql = "INSERT INTO `student`(`id`, `fname`, `lname`, `pass`) VALUES ('0', '$fname', '$lname', '$pass')";
    
    $res = mysqli_query($con, $sql);

    if($res)
    {
        echo "Empolyee Details Inserted <br><br>";
    }

    $sql = "SELECT * FROM student";
    $retval = mysqli_query($con, $sql);

    while($row = mysqli_fetch_array($retval, MYSQLI_ASSOC))
    {
        echo "Emp id: {$row['id']} <br>";
        echo "Emp First Name: {$row['fname']} <br>";
        echo "Emp Last Name:: {$row['lname']} <br>";
    }

    echo "Fetch Data Successfully\n";
?>