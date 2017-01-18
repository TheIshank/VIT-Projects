<HTML>
  <!-- First we fetch the number of votes given to a particular dish -->
  <!-- <link rel="stylesheet" type="text/css" href="css/bootstrap.css"> -->
  <?php
  session_start();
  $con=mysql_connect("localhost","root","");
  if(!$con){
   echo "Database is not connected";
 }
 else{
   mysql_select_db("mess");
   $id=$_GET['id'];
   $sql=mysql_query("select * from dishes where dish_id=$id;");
   $row=mysql_fetch_array($sql);
   $x=$row['upvotes'];
   $y=$row['downvotes'];
   $one=(int)$x;
   $two=(int)$y;
			// echo $one."<br>".$two."jo";
 }
 ?>
 <!-- Supply the fetched data to the chart using javascript -->
 <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
 <script type="text/javascript">
  var up=<?php echo $one; ?>;
  up=parseInt(up);
  var down=<?php echo $two; ?>;
  down=parseInt(down);
  google.charts.load('current', {'packages':['corechart']});
  google.charts.setOnLoadCallback(drawChart);
  function drawChart() {
    var data = google.visualization.arrayToDataTable([
      ['Type', 'Votes'],
      ['Like',up],
      ['Dislike',down]
      ]);

    var options = {
      title: 'Votes'
    };

    var chart = new google.visualization.PieChart(document.getElementById('piechart'));

    chart.draw(data, options);
  }
</script>
<body style=" background-color: #FAFAFA;">
  <div class="panel panel-default" style="margin: auto; width: 800px;">
    <div class="panel-heading"><H1>Dish Details</H1><br></div>
    <?php 
    $id=$_GET['id'];
    $sql=mysql_query("select * from dishes where dish_id='$id';");
    $row=mysql_fetch_array($sql);
    echo "<br><p align=center style='font-size:30;'>".$row['name']."</p>";
    ?>
    <div class="panel-body" style="width: 800px;  background-color: #FFF; padding: 40px; margin: auto; border-width: 20px;white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;">
    <div>
      <?php 
      if($row['n_veg']==1)
      {
        $image_source = "img/non-veg.png";
      }
      else
      {
        $image_source = "img/veg.png";
      }
      echo "<br><img src=img/".$id.".jpg width=200px height=200px style='height:200px; width:200px; border:12px; margin-left:20px;'>";
      echo "<img src=".$image_source." width=200px height=200px align=right style='height:200px; width:200px; border:12px; margin-right:20px;'><br><br><br>"; ?>
    </div>
    <div id= "nutrition" style="float: right; clear: both; margin-top: "-500px";">
      <link rel="stylesheet" type="text/css" href="css/table.css">
      <table id="keywords" cellspacing="0" cellpadding="0" style="border-width:20px;">
        <thead>
          <tr><th>Protein</th><th>Carbohydrate</th><th>Fat</th></tr>
        </thead>
        <tbody>
          <?php
          echo "<tr><td>".$row['Protein']."<td>".$row['Carb']."</td><td>".$row['Fat']."</td></tr>";
          ?>
        </tbody>
      </table>
    </div>
    <div style="float: left;">
      <div id="piechart" ></div>
    </div>
  </div>
  <div>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <center><a href="table.php"><button id="back" class="btn btn-primary">Back</button></a></center>
  </div>
</div>
</body>
</HTML>