<!DOCTYPE html>
<html>
<head>
	<title>charts</title>
	 <meta name="viewport" content="width=device-width,initial-scale=1"/>

  <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.0/css/font-awesome.min.css"> 

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Material Design Bootstrap -->
    <link href="css/mdb.min.css" rel="stylesheet">

</head>
  <body>

  <canvas id="myChart"></canvas>
<!--Step 1: Create <canvas> element in your html file and set it an ID.
Step 2: Declare a new Chart in the javascript section of your project.
Step 3: Make a chart responsive.
Step 4: Declare a data for the chart. -->


<!-- SCRIPTS Starts
   <!-- JQuery -->
    <script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>

    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="js/tether.min.js"></script>

    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="js/bootstrap.min.js"></script>

    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="js/mdb.min.js"></script>

    

 <!-- SCRIPTS Starts -->
   <!-- JQuery -->
    <script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>

    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="js/tether.min.js"></script>

    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="js/bootstrap.min.js"></script>

    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="js/mdb.min.js"></script>

<script type="text/javascript">

  
 function drawPieChart(totalClasses,classesAttendent){
 	 var data = [
    {
        value: totalClasses,
        color:"#F7464A",
        highlight: "#FF5A5E",
        label: "totalClasses"
    },
    {
        value: 50,
        color: "#46BFBD",
        highlight: "#5AD3D1",
        label: "Green"
    },
    {
        value: 100,
        color: "#FDB45C",
        highlight: "#FFC870",
        label: "Yellow"
    }
]

     //step3
     var option = {
          responsive: true,
         };

	//step2
    // Get the context of the canvas element we want to select
    var ctx = document.getElementById("myChart").getContext('2d');
   // var myLineChart = new Chart(ctx).Line(data, option); //'Line' defines type of the chart.
   
   var myPieChart = new Chart(ctx).Pie(data,option);

 }

 window.load(drawPieChart(<?php  echo 10;?>,<?php  echo 8;?>));
</script>
