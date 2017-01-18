<?php
if (isset($_POST['submit'])){
	
	include("functions/database_connection.php");
	session_start();

	if (strcmp($_SESSION['accommodation'], "hosteller")==0) {
		$room= $_POST['room'];
 		$block= $_POST['block'];
	}
	else {
		$room="-";
		$block="-";
	}
 	
    $meet_hrs=$_POST['availDay']." ".$_POST['availTime_from']." to ".$_POST['availTime_To'];
    $club=$_POST['club'];
    $interests="";
    foreach ($_POST['interest'] as $select) {
    	$interests=$interests.", ".$select;
    }
    $interests=substr($interests, 2);
    
    $_SESSION['room']=$room;
    $_SESSION['block']=$block;
    $_SESSION['meet_hrs']=$meet_hrs;
    $_SESSION['club']=$club;
    $_SESSION['interests']=$interests;
    header("location:signup3.php");

}
?>
<!DOCTYPE html>
<html>
<head>
	<title>SignUp: Step-2</title>
	<link rel="stylesheet" type="text/css" href="css/sik_signup2.css">
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
		<form name="step2" method="post" onsubmit="signup2.php">
			<fieldset>
				<legend>Step 2 of 3</legend>
				<center>
				<table class="box" id="input" cellpadding="15px">
					<?php
						session_start();
						if (strcmp($_SESSION['accommodation'],"hosteller")==0) {
							echo "<tr>"
									."<td>"."Room No."."</td>"
									."<td>"."<input type='text' name='room' required autofocus>"."</td>"
								."</tr>"
								."<tr>"
									."<td colspan='2'>"
										."<center>"
											."<input type='radio' name='block' value='a' required checked>A Block &nbsp;&nbsp;"
											."<input type='radio' name='block' value='b' required>B Block &nbsp;&nbsp;"
											."<input type='radio' name='block' value='c' required>C Block"
										."</center>"
									."</td>"
								."</tr>";
						}

					?>
					<tr>
						<td>Available</td>
						<td>
							<select name="availDay">
								<option value="sun">Sun</option>
								<option value="mon">Mon</option>
								<option value="tue">Tue</option>
								<option value="wed">Wed</option>
								<option value="thu">Thu</option>
								<option value="fri">Fri</option>
								<option value="sat">Sat</option>
							</select> &nbsp;&nbsp;&nbsp;
							From <input type="time" name="availTime_from" id="availTime" required>
							To <input type="time" name="availTime_To" required>
							<font id="error"></font>
						</td>
					</tr>
					<tr>
						<td>Club</td>
						<td>
							<select name="club">
								<option value="music">Music</option>
								<option value="dance">Dance</option>
							</select>
						</td>
					</tr>
					<tr>
							<td>Interests</td>
							<td>
								<input type="checkbox" name="interest[]" value="Software Programming"> Software Programming<br><input type="checkbox" name="interest[]" value="Web Design"> Web Designing<br>
								<input type="checkbox" name="interest[]" value="Photography"> Photography<br><input type="checkbox" name="interest[]" value="Gaming"> Gaming<br>
								<input type="checkbox" name="interest[]" value="Robotics"> Robotics<br><input type="checkbox" name="interest[]" value="Image Processing"> Image Processing<br>
								<input type="checkbox" name="interest[]" value="Sports"> Sports<br><input type="checkbox" name="interest[]" value="Performing Arts"> Performing Arts
							</td>			
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