<?php
include('connect.php');
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
        echo "<h3>".$b."%</h3>";
      }
}

else 
{
    echo " 0 results for array ";
    
}
?>
