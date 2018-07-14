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

//echo "Date ".$day."/".$month."/".$year."<br>Time ".$hr.":".$min.":".$sec;
$tmrturl;
$mailurl;
$tmrt1="https://tmrt1.000webhostapp.com/mailer/mailfrompost.php";
$tmrt2="https://tmrt2.000webhostapp.com/mailer/mailfrompost.php";
$lastmailtmrt1="http://tmrt1.000webhostapp.com/mailer/lastmail.php";
$lastmailtmrt2="http://tmrt2.000webhostapp.com/mailer/lastmail.php";
if($hr==16){
    $tmrturl=$tmrt1;
    $mailurl=$lastmailtmrt1;

}else{
     $tmrturl=$tmrt2;
     $mailurl=$lastmailtmrt2;
}
    $lastmailcontents=file_get_contents($mailurl);
    echo $lastmailcontents."<br>";
?>