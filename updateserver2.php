<?php
$today = date("d/m/Y");
//echo $today;
//echo "<br> time code <br>";
$day=($today[0]-'0')*10+($today[1]-'0');
$month=($today[3]-'0')*10+($today[4]-'0');
$year=($today[6]-'0')*1000+($today[7]-'0')*100+($today[8]-'0')*10+($today[9]-'0');
//echo "GMT date is ".$day."/".$month."/".$year."<br>";
$t=time();
//echo($t . "<br>");
//echo(date("Y-m-d",$t));
//echo "<br> gmdate <br>";
$time=(gmdate("H:i:s", $t));
//echo "<br> ".$time."<br>";
$hr=($time[0]-'0')*10+($time[1]-'0');
$min=($time[3]-'0')*10+($time[4]-'0');
$sec=($time[6]-'0')*10+($time[7]-'0');
//echo "GMT time is ".$hr.":".$min.":".$sec."<br>";
$min=$min+30;
if($min>60)
{
	$min=$min-60;
	$hr=$hr+1;
}
$hr=$hr+5;
if($hr>=24)
{
	$hr=$hr-24;
	$day=$day+1;
}
//echo "Added 5:30 hence ";
switch ($month) {
	case '1':
		if($day>31)
		{
			$day=$day-31;
			$month++;
		}
		break;
	case '2':
		if($year%4==0)
		{
			if($day>29)
			{
				$day=$day-29;
				$month++;
			}
		}
		else
		{
			if($day>28)
			{
				$day=$day-28;
				$month++;
			}
		}
		break;
		case '3':
		if($day>31)
		{
			$day=$day-31;
			$month++;
		}
		break;
		case '4':
		if($day>30)
		{
			$day=$day-30;
			$month++;
		}
		break;
		case '5':
		if($day>31)
		{
			$day=$day-31;
			$month++;
		}
		break;
		case '6':
		if($day>30)
		{
			$day=$day-30;
			$month++;
		}
		break;
		case '7':
		if($day>31)
		{
			$day=$day-31;
			$month++;
		}
		break;
		case '8':
		if($day>31)
		{
			$day=$day-31;
			$month++;
		}
		break;
		case '9':
		if($day>30)
		{
			$day=$day-30;
			$month++;
		}
		break;
		case '10':
		if($day>31)
		{
			$day=$day-31;
			$month++;
		}
		break;
		case '11':
		if($day>30)
		{
			$day=$day-30;
			$month++;
		}
		break;
		case '12':
		if($day>31)
		{
			$day=$day-31;
			$month++;
		}
		break;

	
	default:
		echo "server date error";
		break;
}

?>
<?php
////////////////////////////////////// initialise sql variables/////////////////////////////////
$servername = "localhost";
$username = "admin";
$password = "Jayant*1";
$dbname = "NMRL";
//echo "<br> the time is ".$hr.":".$min.":".$sec." and date is ".$day."/".$month."/".$year;
$x=0;$y=0;$z=0;
$update=false;
if(!empty($_GET["x"]))
{
	$x=$_GET["x"]-'0';
	$update=true;
}
if(!empty($_GET["y"]))
{
	$y=$_GET["y"]-'0';
}
if(!empty($_GET["z"]))
{
	$z=$_GET["z"]-'0';
}
if(!empty($_GET["b"]))
{
	$b=$_GET["b"]-'0';
}
//var_dump($x);
echo "X=".$x." Y=".$y." Z=".$z;
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) 
{
    die("Connection failed: " . $conn->connect_error);
}
$date2=$day*100+$month;
$time2=$hr*100+$min;
$sql = "INSERT INTO tilt (date1, year, time1, x, y, z, battery)
                  VALUES ($date2, $year, $time2, $x, $y, $z, $b)";
if($update==true)
{
	 if ($conn->query($sql) === TRUE) 
    {
      echo "<br>OK";
      echo "<br>Time ".$hr.":".$min.":".$sec." Date ".$day."/".$month."/".$year;
    } 
    else 
    {
    echo "<br>";
    echo "Error updating record: " . $conn->error;
    }
    $conn->close();
}
?>
