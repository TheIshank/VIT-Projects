<?php
if (isset($_POST['submit']))
{
	include("functions/database_connection.php");
	session_start();
	$regnum=$_POST['regnum'];
	$password=$_POST['password'];

	$_SESSION['regnum']=$regnum;

	$sql=mysql_query("select * from stud_details where regno='$regnum'");
	$row=mysql_fetch_array($sql);

	$_SESSION['name']=$row['name'];
	$_SESSION['gender']=$row['gender'];
	$_SESSION['accommodation']=$row['accommodation'];
	$_SESSION['mobile']=$row['mobile'];
	$_SESSION['vmail']=$row['vmail'];
	$_SESSION['room']=$row['room'];
	$_SESSION['block']=$row['block'];

	if (strcmp($row['password'],$password)==0) {
        $_SESSION['loginst']=1;
        header("Location: search.php");
    }
    else{
        echo "<script>alert('Either the username or the paswword entered is wrong!')</script>";
    }
}
?>




<!DOCTYPE html>
<html>
<head>
	<title>LogIn</title>
	<link rel="stylesheet" type="text/css" href="css/sik_login.css">
	<style type="text/css">
		#header, #form{
			opacity: 0.8;
		}

		#form input[type=submit]{
			background-color: Transparent;
            background-repeat:no-repeat;
            border: none;
            cursor:pointer;
            overflow: hidden;
            color: #ffd6ff;
            font-size: 20px;
            border: 1px solid #ffd6ff;
            padding: 7px;
		}
		#form input[type=submit]:hover {
			border: 2px solid #383278;
			box-shadow: inset 0px 0px 10px 1px #383278;
		}
		a{
			color: white;
			font-size: 25px;
			text-decoration: none;
		}
		a:hover {
			color: #383278;
			text-shadow: 3px 3px 10px #383278;
		}
	</style>
</head>
<body>
	<div id="header">
		<h1>Student Infromation Kiosk</h1>
	</div>
	<div>
		<form id="form" method="post" action="login.php">
			<br>
			<br>
			<br>	
			<input type="text" name="regnum" placeholder="Registration Number" style="text-transform:uppercase" required><br><br>
			<input type="password" name="password" placeholder="PASSWORD" required><br><br>
			<input type="submit" name="submit" value="LogIn!">
			<p><a href="signup1.php">New User?</a></p>
			<p><a href="">Forgot Password?</a></p>
		</form>
	</div>
</body>
</html>