<?php
if (isset($_POST['submit']))
{
	session_start();

	$regno= $_POST['reg'];	
	$name 	= $_POST['fullname'];
	$mobile= $_POST['mobile'];
	$vmail = $_POST['vmail'];
	$gender = $_POST['gender'];
	$accommodation = $_POST['accommodation'];



	$_SESSION['regno']=$regno;
	$_SESSION['name']=$name;
	$_SESSION['gender']=$gender;
	$_SESSION['vmail']=$vmail;
	$_SESSION['accommodation']=$accommodation;
	$_SESSION['mobile']=$mobile;

	header("Location: signup2.php");
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>SignUp: Step-1</title>
	<link rel="stylesheet" type="text/css" href="css/sik_signup1.css">
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
		<form name="step1" method="post" onsubmit="signup1.php">
			<fieldset>
				<legend>Step 1 of 3</legend>
				<center>
				<table class="box" id="input" cellpadding="15px">
						<tr>
							<td>Registration Number</td>
							<td><input type="text" name="reg" maxlength="9" style="text-transform:uppercase;" autofocus required></td>
						</tr>
						<tr>
							<td>Name</td>
							<td><input type="text" name="fullname" style="text-transform: capitalize;" required></td>
						</tr>
						<tr>
							<td>Mobile Number</td>
							<td><input type="text" name="countrycode" size="1" value="+91" disabled><input type="text" name="mobile" size="14" required></td>
						</tr>
						<tr>
							<td>Vit mail ID</td>
							<td><input type="email" name="vmail" placeholder="eg: abc.efg2015@vit.ac.in" required></td>
						</tr>
						<tr>
							<td><center><input type="radio" name="gender" value="male" required checked>Male</center></td>
							<td><input type="radio" name="gender" value="female">Female</td>
						</tr>
						<tr>
							<td><center><input type="radio" name="accommodation" value="hosteller" required checked>Hosteller</center></td>
							<td><input type="radio" name="accommodation" value="dayscholar">Day Scholar</td>
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