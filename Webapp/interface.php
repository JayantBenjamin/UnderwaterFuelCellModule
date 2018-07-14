<!DOCTYPE html>
<html>
<head>
  <!-- Favicon-->
 <link rel="icon" href="website_favicon.ico" type="image/png" sizes="16x16">
<!-- Favicon end -->
  <title>SMFC Monitor</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
  body{
    position: relative;
    height: 5000px;

  }
  #logos{
    position: absolute;
    top: 50px;
    right:10px ;
    
  }
  #logos img{
    margin: 10px;
    width: 50px;
    height: 50px;

    display: inline-block;
  }
 
   





  
  .container .row {
    margin-top:55px;
    color: #000000; 
    background-color: #ffffff;
    border-radius: 2px;
    padding-left: 3%;
    padding-top: 2%;
    padding-bottom: 2%;
    box-shadow: 3px 3px 5px 6px #ccc;
  }
 

  .sliders{
    margin: 1%;
  }
  
  input[type=range] {
    -webkit-appearance: none;
    width: 100%;
    height:15px;
    -webkit-border-radius: 1em;
    border-radius: 1em;

    -webkit-background-clip: padding;
    background-clip: padding-box;
    border: 1px solid #aaa;
    background: #eee;
  }
  .tp{
    border:5px solid black;
  }

  input[type="range"]::-webkit-slider-thumb {
    -webkit-appearance: none;
    width: 28px;
    height: 28px;
    border: 1px solid #044062;
    background: #396b9e;
    background-image: linear-gradient(#5f9cc5,#396b9e);
    -webkit-box-shadow: 0 1px 3px rgba(0,0,0,.2);
    box-shadow: 0 1px 3px rgba(0,0,0,.2);    
    cursor: pointer;
    -webkit-border-radius: 1em;
    border-radius: 1em;
    border-top: 1px solid #fff;
    border-color: rgba(255,255,255,.3);
  }


  </style>
</head>
<body data-spy="scroll" data-target=".navbar" data-offset="50">

<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse"  data-target="#myNavbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>                        
        </button>

      <a class="navbar-brand" href="#">TMRT Smart Platform</a>
    </div>
    <div>
      <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav">
          <li><a href="#Tilt">Incline</a></li>
          <li><a href="#Volt">Voltage Readings</a></li>
          <li><a href="#Battery">Battery Status</a></li>
          <li><a href="#Threshold">Threshold</a></li>
          <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Communication<span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="#SMS">SMS</a></li>
              <li><a href="#Email" >Email</a></li>
            </ul>
          </li>
        </ul>

        <ul class="nav navbar-nav navbar-right">
              <li><a href="#" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-user" ></span> Contact Us</a></li>
              <li><a href="#" data-toggle="modal" onclick="logout()"><span class="glyphicon  glyphicon-log-out" ></span> Log Out</a></li>
              
        </ul>

      </div>
    </div>
  </div>
</nav>    

<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div>
      <div class="modal-body">
        <p>Some text in the modal.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<div  id="logos">
    <img src="imgs/somaiyatrust.png" class="img-responsive" alt="vidya">
    <img src="imgs/somaiya.png" class="img-responsive" alt="trust">
    
  </div>
<div class="container">
  

  <div class="row " id="Tilt" >
    <h3>Incline</h3>
      <?php  include("tilt.php");?>
    <div id="showTilt"></div>

  </div>

  <div class="row" id="Volt"><h3>Voltage</h3>
    <?php 
        include('volt.php');
    ?>
    <div id="showVolt"></div>

  </div>
  <div class="row " id="Battery"><h3>Battery   Status</h3>
    <?php 
        include('batteryGUI.php');
    ?>

    <div id="batterygui" style="width: 900px; height: 450px;"></div>

  </div>
  <div class="row " id="Threshold"><h3>Threshold</h3>
    <div id="previousChange">
      
    </div>
    <div class="sliders">
     <label for="X">X</label> <input type="range"  min="0" max="180" value="50" link-to="xrange">
    <br><br>
    <input type="text" id="xrange">
    </div>
    <div class="sliders">
     <label for="Y">Y</label> <input type="range"  min="0" max="180" value="50" link-to="yrange">
    <br><br>
    <input type="text" id="yrange">
    </div>
    <div class="sliders">
     <label for="Z">Z</label> <input type="range"  min="0" max="180" value="50" link-to="zrange">
    <br><br>
    <input type="text" id="zrange">
    </div>
    <div>
      <input type="button" id="changeThreshold" class="btn btn-primary" value="Save Changes">
    </div>
  </div>
  <div class="row " id="SMS"><h3>SMSs(s) LEFT</h3>
    <?php 
        include('smsbalance.php');
    ?>
    <button type="button"  onclick="getCredits()" class=" btn btn-primary" id="addCredits" value="" >Add Credits</button>
  </div>
  <div class="row " id="Email">
    <h3>Send Email</h3>
    <?php
    include 'checkTime.php';
    //tp
    ?>
    <button type="button" class=" btn btn-primary"  id="dailyLog" value="" >Daily Log</button>
    <button type="button" class=" btn btn-primary" id="monthlyLog" value="" >Monthly Log</button>
  </div>
  
</div>

<script type="text/javascript">
  $("#changeThreshold").click(function(){

    var x=$("#xrange").val();
    var y=$("#yrange").val();
    var z=$("#zrange").val();
    
    
    $.ajax("getThresholdValues.php",{
      type:'POST',
      data:{xrange:x,yrange:y,zrange:z},
      success:function (result) {
        // body...
        alert(result);
        if(result=="SUCCESS")
          $("#previousChange").html("<h2>X: "+x+" Y: "+y+" Z: "+z+" </h2>");

      }
    }

      );
  });

$("#dailyLog").click(function(){

    
    
    $.ajax({url: "postDATE.php",
      success: function(result){
            console.log(result);
        }});
  });

$("#monthlyLog").click(function(){

    
    
    $.ajax({url: "postMonth.php",
      success: function(result){
            console.log(result);
        }});
  });

</script>


<script src="https://www.gstatic.com/firebasejs/5.0.4/firebase.js"></script>
<script>
  // Initialize Firebase
  var config = {
    apiKey: "AIzaSyAEvViQ3Iu1MuYaUmtar2_FL_3bQmCSrYA",
    authDomain: "tmrt-de19a.firebaseapp.com",
    databaseURL: "https://tmrt-de19a.firebaseio.com",
    projectId: "tmrt-de19a",
    storageBucket: "",
    messagingSenderId: "383420827766"
  };
  firebase.initializeApp(config);

  function logout() {
      firebase.auth().signOut();
  }

  function getCredits(  ) {
    // body...
    window.open("https://control.msg91.com/user/index.php#payment");
  }

  firebase.auth().onAuthStateChanged(function(user) {
    if (user) {
      // User is signed in.
      var displayName = user.displayName;
      var email = user.email;
      var emailVerified = user.emailVerified;
      var photoURL = user.photoURL;
      var isAnonymous = user.isAnonymous;
      var uid = user.uid;
      var providerData = user.providerData;
      console.log("logged...........")
    
      // ...
    } else {
      // User is signed out.
      // ...
      console.log("not logged");
        window.location="index.php";
    }
  });




</script>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script>

  $(function() {
    $('input').filter( function(){return this.type == 'range' } ).each(function(){  
      var $slider = $(this),
        $text_box = $('#'+$(this).attr('link-to'));
      
      $text_box.val(this.value);
      
      $slider.change(function(){
        $text_box.val(this.value);
      });
      
      $text_box.change(function(){
        $slider.val($text_box.val());
      });

    });
  });

  google.charts.load('current', {'packages':['line']});
  google.charts.load("current", {packages:["corechart"]});
  google.charts.setOnLoadCallback(drawTiltChart);
  google.charts.setOnLoadCallback(drawVoltChart);
  google.charts.setOnLoadCallback(drawBatteryGUI);

  function drawTiltChart() {

      var data = new google.visualization.DataTable();
      data.addColumn('number', 'Time of Day');
      data.addColumn('number', 'X');
      data.addColumn('number', 'Y');
      data.addColumn('number', 'Z');
      
      data.addRows([
        <?php
        $i=0;
        for ($i=0;$i<$timel;$i++) 
        {
            $ttime[$i]=$ttime[$i];
            echo "[".$ttime[$i].", ".$x[$i].", ".$y[$i].", ".$z[$i]."],";   
        }
        
        ?>
        // [1,  37.8, 80.8],
        // [2,  30.9, 69.5],
        // [3,  25.4,   57],
        // [4,  11.7, 18.8],
        // [5,  11.9, 17.6],
        // [6,   8.8, 13.6],
        // [7,   7.6, 12.3],
        // [8,  12.3, 29.2],
        // [9,  16.9, 42.9],
        // [10,  16.9, 42.9],
        // [11,  16.9, 42.9],
        // [12,  16.9, 42.9],
        // [13,  16.9, 42.9],
        // [14,  16.9, 42.9],
        // [15,  16.9, 42.9],
        // [16,  16.9, 42.9],
        // [17,  16.9, 42.9],
        // [18,  16.9, 42.9],
        // [19,  16.9, 42.9],
        // [20,  16.9, 42.9],
        // [21,  16.9, 42.9],
        // [22,  16.9, 42.9],
        // [23,  16.9, 42.9],
        // [24,  16.9, 42.9],
       
      ]);


      var options = {
        chart: {
          title: 'Daily analysis',
          subtitle: 'readings from the accelerometer'
        },
        width: 900,
        height: 500,
        hAxis: { format: ''},
        axes: {
          x: {
            0: {side: 'top'}
          }
        }
      };

      var chart = new google.charts.Line(document.getElementById('showTilt'));

      chart.draw(data, google.charts.Line.convertOptions(options));
    }
  function drawVoltChart() {

      var data = new google.visualization.DataTable();
      data.addColumn('number', 'Time of Day');
      data.addColumn('number', 'Voltage of 1st terminal');
      data.addColumn('number', 'Voltage of 2nd terminal');
      data.addColumn('number', 'Voltage of 3rd terminal');
      
      data.addRows([
        <?php
        $i=0;
        for ($i=0;$i<$timel;$i++) 
        {
            $ttime[$i]=$ttime[$i];
            echo "[".$ttime[$i].", ".$v1[$i].", ".$v2[$i].", ".$v3[$i]."],";   
        }
        
        ?>
        // [1,  37.8, 80.8],
        // [2,  30.9, 69.5],
        // [3,  25.4,   57],
        // [4,  11.7, 18.8],
        // [5,  11.9, 17.6],
        // [6,   8.8, 13.6],
        // [7,   7.6, 12.3],
        // [8,  12.3, 29.2],
        // [9,  16.9, 42.9],
        // [10,  16.9, 42.9],
        // [11,  16.9, 42.9],
        // [12,  16.9, 42.9],
        // [13,  16.9, 42.9],
        // [14,  16.9, 42.9],
        // [15,  16.9, 42.9],
        // [16,  16.9, 42.9],
        // [17,  16.9, 42.9],
        // [18,  16.9, 42.9],
        // [19,  16.9, 42.9],
        // [20,  16.9, 42.9],
        // [21,  16.9, 42.9],
        // [22,  16.9, 42.9],
        // [23,  16.9, 42.9],
        // [24,  16.9, 42.9],
       
      ]);


      var options = {
        chart: {
          title: 'Daily analysis',
          subtitle: 'readings from the multimeter'
        },
        width: 900,
        height: 500,
        hAxis: { format: ''},
        axes: {
          x: {
            0: {side: 'top'}
          }
        }
      };

      var chart = new google.charts.Line(document.getElementById('showVolt'));

      chart.draw(data, google.charts.Line.convertOptions(options));
    }
  function drawBatteryGUI() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['Remaining',    <?php echo $b;?>],
          ['Discharge',     <?php $b=100-$b;echo $b;?>],
          
        ]);

        var options = {
          title: 'Battery Status',
          pieHole: 0.9,
        };

        var chart = new google.visualization.PieChart(document.getElementById('batterygui'));
        chart.draw(data, options);
      }


</script>

</body>
</html>
