<!DOCTYPE html>
<html>
<?php
session_start();

?>
<head>
	<title>
		<?php
		echo $_SESSION['name'];
		?>
	</title>
	<style type="text/css">
		table { 
			border-spacing: 10px;
			border-collapse: separate;
			padding: 55px;
		}
	</style>
	<!-- <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css"> -->
</head>
<body>
	<center>
		<h1>
			<?php
			echo "Welcome ".$_SESSION['name']."</h1>";
			$regnum=$_SESSION['username'];
			$con=mysql_connect("localhost","root","");
			if(!$con){
				echo "Database is not connected";
			}
			else{
				mysql_select_db("mess");
			}?>
			<h3>Last Five Consumptions</h3>
			<link rel="stylesheet" type="text/css" href="css/table.css">
			<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
			<script src="http://tablesorter.com/__jquery.tablesorter.min.js"></script>
			<table id="keywords" cellspacing="0" cellpadding="0" style="border-width:20px;">
				<thead>
					<tr><th>S No.</th><th>Dish</th><th>Date</th><th>Time</th></tr>
				</thead>
				<tbody>
					<?php
					$sql = mysql_query("select name,date,time from mess_data,dishes where dishes.dish_id = mess_data.dish_id and reg_no='$regnum' order by date desc,time desc;");
					$i=1;
					while($row=mysql_fetch_array($sql))
					{
						echo "<tr><td>".$i++."</td><td>".$row['name']."<td>".$row['date']."</td><td>".$row['time']."</td></tr>";
						if($i==6)
							break;
					}
					?>
				</tbody>
			</table>
			<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
			<a href="table.php"><button class="btn btn-primary"> Vote for your favourite dish</button></a><br><br>
			<a href="logout.php"><button class="btn btn-danger"> Logout</button></a>
		</center>
	</body>
	</html>