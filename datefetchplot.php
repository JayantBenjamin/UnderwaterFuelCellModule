<?php
////////////////////////////////////// initialise sql variables/////////////////////////////////
$servername = "localhost";
$username = "admin";
$password = "Jayant*1";
$dbname = "NMRL";
////////////Variable list///////////////////////////
$i=0;
$xarray[]=array();
$yarray[]=array();
$zarray[]=array();
$time[]=array();
////////////////////////////////////ask for max date//////////////////////////// 
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) 
{
    die("Connection failed: " . $conn->connect_error);
} 
$sql= "SELECT MAX(date1) FROM tilt";
$result = $conn->query($sql);
$max_public_date = mysqli_fetch_row($result);
$last_date = $max_public_date[0];
//echo "Latest entry is of the date ".$last_date;
$sql = "SELECT time1,x,y,z FROM tilt WHERE date1 = $last_date";
$i=0;
$result = $conn->query($sql);
if ($result->num_rows > 0) 
{
    // output data of each row
    while($row = $result->fetch_assoc()) 
    {
    	
    		$xarray[$i]=$row["x"];
    		$yarray[$i]=$row["y"];
    		$zarray[$i]=$row["z"];
    		$time[$i]=$row["time1"];
    		$i++;
    		
       }
}

else 
{
    echo " 0 results for array ";
    echo $sql;
}
echo "<br>";
//var_dump($xarray);
//echo "<br>";
//var_dump($time);
//echo "<br>";

/////////////////////////making a graph //////////////////////////////
?>
<html>
<body>


  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['line']});
      google.charts.setOnLoadCallback(drawChart);

    function drawChart() {

      var data = new google.visualization.DataTable();
      data.addColumn('number', 'Time of Day');
      data.addColumn('number', 'X axis');
      data.addColumn('number', 'Y axis');
      data.addColumn('number','Z axis');

      data.addRows([
      	<?php
      	$i=0;
      	$timel=sizeof($time);
      	for ($i =0;$i<$timel;$i++) 
      	{
      		echo "[";
      		echo $time[$i]/100;
      		echo ", ";
      		echo $xarray[$i];
      		echo ", ";
      		echo $yarray[$i];
      		echo ", ";
      		echo $zarray[$i];
      		echo "],";
      	}
      	?>
        ]);


      var options = {
        chart: {
          title: 'Daily analysis',
          subtitle: 'The plot below shows variance in the X, Y and Z axes'
        },
        width: 900,
        height: 500,
        axes: {
          x: {
            0: {side: 'top'}
          }
        }
      };

      var chart = new google.charts.Line(document.getElementById('line_top_x'));

      chart.draw(data, google.charts.Line.convertOptions(options));
    }
  </script>

<div id="line_top_x"></div>

<p style="color: red;">Test Message</p>

</body>
</html>

