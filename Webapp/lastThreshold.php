<?php
require 'connect.php';
      error_reporting(E_ALL);
      ini_set('display_errors', 1);
      
      $sql="select * from threshold order by id desc limit 1";
      //$sql="select * from tilt";
  //    $sql="SELECT * FROM threshold ORDER BY ID DESC LIMIT 1";
     $x;
     $y;
     $z;
     $result = $conn->query($sql);
     
      if ($result->num_rows > 0) 
      {
          // output data of each row
          while($row = $result->fetch_assoc()) 
          {
            
            $x=$row["x"];
            $y=$row["y"];
            $z=$row["z"];

           
          }

          echo "X :".$x." Y: ".$y." Z: ".$z ;
      }
     


      ?> 
        