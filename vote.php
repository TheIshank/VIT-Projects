<?php
session_start();
$con=mysql_connect("localhost","root","");
if(!$con){
	echo "Database is not connected";
}
else{
	mysql_select_db("mess");
	if(isset($_POST['upvote']))
	{
		$dish = $_POST['upvote'];
		$sql=mysql_query("SELECT * FROM dishes WHERE dish_id = $dish;");
		$row= mysql_fetch_array($sql);
		$votes=$row['upvotes'];
		$votes+=1;
		$sql = mysql_query("UPDATE dishes SET upvotes = $votes WHERE dish_id = $dish;");
	}
	else if(isset($_POST['downvote']))
	{
		$dish = $_POST['downvote'];
		$sql=mysql_query("SELECT * FROM dishes WHERE dish_id = $dish;");
		$row= mysql_fetch_array($sql);
		$votes=$row['downvotes'];
		$votes+=1;
		$sql = mysql_query("UPDATE dishes SET downvotes = $votes WHERE dish_id = $dish;");
	}
}	
echo "Thanks for Voting";
mysql_close();
?>