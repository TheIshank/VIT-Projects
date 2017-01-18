<?php
	include("functions/database_connection.php");
	session_start();
?>









<html>
	<head>
		<title>Search Result</title>
		<link rel="stylesheet" type="text/css" href="css/sik_search_result.css">
		<style type="text/css">
			.frame1 h1{
				color: #ffd6ff;
			}
			a{
				text-decoration: none;
				color: #ffd6ff;
			}
			th{
				color: #ffd6ff;
				font-size: 16px;
				font-family: "Segoe UI Light","Segoe UI",Arial,Helvetica,sans-serif;
				border-bottom: 1px solid #ffd6ff;
				padding-right: 10px;
				padding-left: 10px;
				padding-bottom: 7px;
				text-align: center;
			}
			td{
				color: #ffd6ff;
				font-size: 16px;
				font-family: "Segoe UI Light","Segoe UI",Arial,Helvetica,sans-serif;
				padding-right: 10px;
				padding-left: 10px;
				padding-top: 7px;
				padding-bottom: 7px;
				text-align: center;
			}
			button{
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
			button:hover {
				border: 2px solid #383278;
				box-shadow: inset 0px 0px 10px 1px #383278;
			}
			hr{
				opacity: 0.9;
				color: #ffd6ff;
			}
			#header, .frame1{
				opacity: 0.8;
			}
		</style>
	</head>
	<body>
		<div id="header">
			<h1>Search Result</h1>
		</div>
		<div class="frame1" id="form">
			<br>
			<br>
			<?php
				$query=$_SESSION['query'];
				$sql=mysql_query("select * from stud_details where tags like '%{$query}%';");
				$i=1;
				echo "<table align='center'>"
						."<tr>"
							."<th>"."S No."."</th>"
							."<th>"."Registration Number"."</th>"
							."<th>"."Name"."</th>"
							."<th>"."Gender"."</th>"
							."<th>"."Accommodation"."</th>"
							."<th>"."Mobile Number"."</th>"
							."<th>"."Mail id"."</th>"
							."<th>"."Room No."."</th>"
							."<th>"."Block"."</th>"
							."<th>"."Meet Hrs"."</th>"
							."<th>"."Club"."</th>"
							."<th>"."Interests"."</th>"
						."</tr>";
				while ($row=mysql_fetch_assoc($sql)) {
					
					echo "<tr>"
							."<td>".$i."</td>"
							."<td>".strtoupper($row['regno'])."</td>"
							."<td>".ucwords($row['name'])."</td>"
							."<td>".ucwords($row['gender'])."</td>"
							."<td>".ucwords($row['accommodation'])."</td>"
							."<td>".ucwords($row['mobile'])."</td>"
							."<td>".$row['vmail']."</td>"
							."<td>".ucwords($row['room'])."</td>"
							."<td>".ucwords($row['block'])."</td>"
							."<td>".ucwords($row['meet_hrs'])."</td>"
							."<td>".ucwords($row['club'])."</td>"
							."<td>".ucwords($row['interests'])."</td>"
						."</tr>";
					$i++;
				}

				echo "</table>";

			?>
			<br>
			<br>
			<br>
			<a href="search.php"><button>HOME</button></a>
			<br>
			<br>
			<br>
			<br>
		</div>
	</body>
</html>