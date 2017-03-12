<?php
     error_reporting(0);
  require '../db/connection.php';
  session_start();
 
     $enroll = $_GET['enroll'];
     $attendance= $_GET['attendance'];
     $name= $_GET['name'];
   

?> <a style="position: absolute; right: 15px; padding: 10px;" onclick="closeStudentDetailes()" class="lead red-text"><h3>&times; </h3></a>

<div  >
<img class="" style="float: left; " src="../img/students/<?php echo $enroll.".jpg";?>" width="30%"/> 
</div>
 <div class="" style="padding-top: 20px;">
		&nbsp; &nbsp; Enroll : <?php echo $enroll; ?> <br />
		&nbsp; &nbsp; Name : <?php echo $name; ?> <br />
		&nbsp; &nbsp; Attendance : <?php echo $attendance; ?> <br />
</div>
