<?php
    	if(isset($_POST['login'])){
     
    		session_start();
    		include('Session Connection.php');
     
    		$username=$_POST['username'];
    		$password=$_POST['password'];
     
    		$query=$conn->query("select * from `user` where username='$username' && password='$password'");
			$num_rows = $query->num_rows;
     
    		if ($num_rows == 0)
            {
    			$_SESSION['message']="Login Failed. User not Found!";
    			header('location:Session Form.php');
				exit();
    		}
    		else
            {
    			$row=$query->fetch_assoc();
     
    			if (isset($_POST['remember']))
                {
    				//set up cookie
    				setcookie("username", $row['username'], time() + (86400 * 30), "/"); 
    				setcookie("password", $row['password'], time() + (86400 * 30), "/");
    			}
     
    			$_SESSION['id']=$row['id'];
    			header('location:Session Success.php');
				exit();
    		}
    	}
    	else
        {
			session_start();
			$_SESSION['message']="Please Login!";
			header('location:Session Form.php');
			exit();
    	}
?>