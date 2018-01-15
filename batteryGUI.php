<?php
////////////////////////////////////// initialise sql variables/////////////////////////////////
$servername = "localhost";
$username = "admin";
$password = "Jayant*1";
$dbname = "NMRL";
////////////Variable list///////////////////////////

///////////////create connnection///////////////////
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) 
{
    die("Connection failed: " . $conn->connect_error);
} 
$sql= "SELECT MAX(id) FROM tilt";
$result = $conn->query($sql);
$max_public_date = mysqli_fetch_row($result);
$last_id = $max_public_date[0];
//echo "Latest entry is of the date ".$last_date;
$sql="SELECT * FROM tilt WHERE id=$last_id";
$result = $conn->query($sql);
if ($result->num_rows > 0) 
{
    // output data of each row
    while($row = $result->fetch_assoc()) 
    {
      
        $b=$row["battery"];
      }
}

else 
{
    echo " 0 results for array ";
    echo $b;
}
?>
<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['Remaining',    <?php echo $b;?>],
          ['Discharge',     <?php $b=100-$body;echo $b;?>],
          
        ]);

        var options = {
          title: 'Battery Status',
          pieHole: 0.9,
        };

        var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="donutchart" style="width: 900px; height: 500px;"></div>
  </body>
</html>