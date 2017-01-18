<HTML>
  <HEAD>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/table.css">
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="http://tablesorter.com/__jquery.tablesorter.min.js"></script>
    <script>
      $(function() {
        $('#keywords').tablesorter();
      });
    </script>
    <script type="text/javascript">
      function upVote(item)
      {
        $.ajax({
            type: 'post',
            url: 'vote.php',
            data: {'upvote':item},
            success: function (result) {
              alert(result);
            }
          })
      }
      function downVote(item)
      {
        $.ajax({
            type: 'post',
            url: 'vote.php',
            data: {'downvote':item},
            success: function (result) {
              alert(result);
            }
          })
      }
    </script>
  </HEAD>
  <body>
   <div id="wrapper">
    <h1>Vote for your favorite dish</h1>

    <table id="keywords" cellspacing="0" cellpadding="0" style="border-width:20px;">
      <thead>
        <tr><th>S No.</th><th>Dish Name</th><th>Your Vote</th><th>Dish Info</th></tr>
      </thead>
      <tbody>
        <?php
        $con=mysql_connect("localhost","root","");
        if(!$con){
          echo "Database is not connected";
        }
        else{
          mysql_select_db("mess");
        }
        $sql=mysql_query("select * from dishes;");
        $i=1;
        while($row=mysql_fetch_array($sql))
        {
          echo "<tr><td>".$i++."</td><td>".$row['name']."<td><button class='btn btn-success' style='width:100px' onclick='upVote($row[dish_id]);'>Like</button><br><br><button class='btn btn-danger' style='width:100px' onclick='downVote($row[dish_id]);'>Dislike</button></td><td><a href='piechart.php?id=$row[dish_id]' style='text-decoration:none;'><button class='btn btn-primary' style='width:100px'>View Details</button></a></td></tr>";
        }
        ?>
      </tbody>
    </table>
    <div>
      <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
      <center><a href="profile.php"><button id="back" class="btn btn-primary">Back</button></a></center>
    </div>
  </div>
</body>
</HTML>