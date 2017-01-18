<?php
if (isset($_POST['submit'])){
	include("functions/database_connection.php");
	session_start();

	$password=$_POST['password'];
	$cpassword=$_POST['cpassword'];
	if (strcmp($password, $cpassword)!=0) {
		echo "<script>
				alert('Please provide the same password in (create your password) and (confirm password) field!');
			</script>";
	}
	else {
		$_SESSION['password']=$password;

		$regno=$_SESSION['regno'];
		$name=$_SESSION['name'];
		$gender=$_SESSION['gender'];
		$accommodation=$_SESSION['accommodation'];
		$mobile=$_SESSION['mobile'];
		$vmail=$_SESSION['vmail'];
		$room=$_SESSION['room'];
		$block=$_SESSION['block'];
		$meet_hrs=$_SESSION['meet_hrs'];
		$club=$_SESSION['club'];
		$interests=$_SESSION['interests'];
		$tags=strtolower($regno).", ".strtolower($name).", ".strtolower($mobile).", ".strtolower($vmail).", ".strtolower($room).", ".strtolower($club).", ".strtolower($interests);
		$sql=mysql_query("insert into stud_details (regno,password,name,gender,accommodation,mobile,vmail,room,block,meet_hrs,club,interests,tags) values ('$regno','$password','$name','$gender','$accommodation','$mobile','$vmail','$room','$block','$meet_hrs','$club','$interests','$tags');");

		if ($sql) {
			echo "<script>"
					."alert('You have Successfully Registered!');"
					."window.location.href='search.php';"
				."</script>";
		}
		else{
			echo mysql_error($connection);
	 		// echo "<script type='text/javascript'>alert('Error in Registration!')</script>";
		}

	}



}

?>





<!DOCTYPE html>
<html>
<head>
	<title>SignUp: Step-3</title>
	<link rel="stylesheet" type="text/css" href="css/sik_signup3.css">
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
	</style>
</head>
<body>
	<div id="header">
			<h1>SignUp</h1>
	</div>
	<div id="form">
		<br>
		<br>
		<br>
		<form name="step3" method="post" onsubmit="signup3.php">
			<fieldset>
				<legend>Step 3 of 3</legend>
				<center>
				<table class="box" id="input" cellpadding="15px">
					<tr>
						<td>Create Password:</td>
						<td><input type="password" name="password"></td>
					</tr>
					<tr>
						<td>Confirm Password:</td>
						<td><input type="password" name="cpassword"></td>
					</tr>
				</table>
				</center>
			</fieldset>
			<br><br>
			<input type="submit" name="submit" value="Next">
		</form>
	</div>
</body>
</html>