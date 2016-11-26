<HTML>
	<?php
		if (isset($_POST['submit']))
		{
			session_start();
			$_SESSION['username']=$_POST['username'];
			$regnum=$_POST['username'];
			$_SESSION['inputPassword']=$_POST['inputPassword'];
			
			$con=mysql_connect("localhost","root","");
	      	if(!$con){
	        	echo "Database is not connected";
	     	}
	      	else{
	        	mysql_select_db("mess");
	      	}

			$sql = mysql_query("select * from student where reg_no='$regnum';");
			$row = mysql_fetch_array($sql);
			$_SESSION['name']=$row["name"];
			if ($row["password"]==$_SESSION['inputPassword']) {
				header("location: profile.php");
			}
			else{
				echo "<script type='text/javascript'>alert('Please enter correct password and username!');</script>";
			}
		}

	?>
	<head>
		<meta charset="utf-8">
		<title>Un-Mess: Simplifying the mess</title>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css">
		<!-- <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script> -->
		<script type="text/javascript" src="js/bootstrap.min.js"></script>
	</head>
	<body>
	<div class="container">
		<div class="page-header">
		<center>
		  <h1 style="line-height: 50%; font-size: 70px">Un - Mess</h1><br>
		  <p class="lead" style="font-size: 17px">SIMPLIFYING THE MESS</p>
		 </center>
		</div>
		<div class="row">
			<div class="col-md-4">
			</div>
			<div class="col-md-4">
				<h2><center>Login</center></h2><br>
				<form method="post">
					<label for="inputReg" class="sr-only">Registration Number</label>
			        <input type="text" id="inputReg" name="username" class="form-control" placeholder="Registration Number" style="text-transform:uppercase" required autofocus>
			        <label for="inputPassword" class="sr-only">Password</label>
			        <input type="password" id="inputPassword" name="inputPassword" class="form-control" placeholder="PASSWORD" required>
			        <br>
			        <button class="btn btn-lg btn-primary btn-block" name="submit" type="submit">Sign in</button>
				</form>
				<a href="employee.php">Employee Login</a>
			</div>
			<div class="col-md-4">
			</div>
		</div>
	</div>
	</body>
</HTML>