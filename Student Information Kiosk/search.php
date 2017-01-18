<?php
if (isset($_POST['submit']))
{
	session_start();
	$query=$_POST['query'];

	$_SESSION['query']=$query;
	header("location:search_result.php");


}
?>





<html>
	<head>
		<title>Search</title>
		<link rel="stylesheet" type="text/css" href="css/sik_search.css">
		<style type="text/css">
			#button{
				margin-left: 850px;
			}
			.adropbtn {
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
			.adropdown {
			    position: relative;
			    display: inline-block;
			}

			.adropdown-content {
			    display: none;
			    position: absolute;
			    background-color: #ffffff;
			    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
			}

			.adropdown-content a {
			    color: black;
			    padding: 10px 14px;
			    text-decoration: none;
			    display: block;
			}
			.adropdown:hover .adropdown-content {
			    display: block;
			}

			.adropdown:hover .adropbtn {
			    border: 2px solid #383278;
				box-shadow: inset 0px 0px 10px 1px #383278;
			}
			#header, .frame1{
				opacity: 0.8;
			}

			.frame1 input[type=submit]{
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
			.frame1 input[type=submit]:hover {
				border: 2px solid #383278;
				box-shadow: inset 0px 0px 10px 1px #383278;
			}
		</style>
	</head>
	<body>
		<div id="header">
			<h1>Student Information Kiosk</h1>
		</div>
		<div class="frame1" id="form">
			<br>
			<div id="button">
			<div class="adropdown">
				<button class="adropbtn">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&#8801;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button>
			 	<div class="adropdown-content">
			 		<a id="dc_a" href="">Profile</a>
			 		<a id="dc_b_b" href="">Edit profile</a>
				    <a id="dc_b_c" href="logout.php">Logout</a>
		 	 	</div>
			</div>
			</div>
			<br>
			<br>
			Enter registration number or name
			<br>
			<br>
			<form method="post" action="search.php">
				<center>
					<input type="text" placeholder="Search" name="query" style="text-transform:uppercase" required autofocus><br><br>
					<input type="submit" name="submit">
				</center>
			</form>
		</div>
	</body>
</html>