<?php
include '../db/connection.php';
include '../sideNav.php';
 include '../Bootstrap.php';
 session_start();
  $role=$_SESSION['role'];
//check if user is admin then only show the below content
 if(!strcmp($role,'admin')){
?>

<!DOCTYPE html>
<html>
<head>
	<title>AMS-Admin</title>
<?php
 // this will load the essential bootstrap files
 loadBootstrapCSS();
?>
<link href="../css/Faculties.css" rel="stylesheet" />

<link rel="stylesheet" href="../css/w3Css.css">
 <!-- Your custom styles (optional) -->
    <link href="../css/index.css" rel="stylesheet">


 </head>

<body onload="myFunction()" style="margin:0;">

<div id="loader"><center id="loading" class="blue-text">
  <i class="fa fa-spinner fa-spin fa-5x fa-fw"></i>
   <span class="sr-only">Loading...</span>
  </center>
</div>

<div style="display:none;" id="myDiv">


<?php
  $sideNavArray = array('Home'=>'index.php',
              'Notes'=>'index.php',
            'Faculties'=>'Faculties.php',
             'Contacts'=>'Contacted.php',
              'Feedback'=>'ViewFeedback.php',
             'Log Out'=>'../logMeOut.php');
addSideNav($sideNavArray,'index.php');

  ?>

     <br /> <hr /> <br />
        <div class="col-md-11 jumbotron col-sm-4"  >
                 <div class="team container col-sm-3" >
                      		   <div class="team-player text-xs-center" >
			                        <img src="../img/ams/<?php echo $_GET['facultyName'];?>.jpg" alt="Thumbnail Image" class="img-raised img-circle">
			                        <h4 class="title">Faculty Name<br />
										<small class="text-muted">Professor</small>
									</h4>
                                </div>
                         </div>


                    <!---->
                       <div class="col-sm-7">
                            <hr />
                         <?php

                          if( isset($_GET['facultyName'])){
                               $enroll_no = $_GET['facultyName'];
                            $facultyDetailes="SELECT * FROM valid_users_list WHERE enroll_no='{$enroll_no}' AND role = 'teacher'";
                              if($resultSet = $dbConnection->query($facultyDetailes)){
                                 if($row = $resultSet->num_rows){
                                   $row = $resultSet->fetch_object();
                                        }
                                 }
                          }
                         ?>

                            <h3 class="h3-responsive">  <small> Enroll :</small> <?php echo $row->enroll_no;?>  </h3>  <hr />
                            <h3 class="h3-responsive"><small> Name :</small> <?php echo $row->username;?> </h3> <hr />
                            <h3 class="h3-responsive">  <small> Department :</small> <?php echo $row->department;?>  </h3>  <hr />
                            <h3 class="h3-responsive"><small> Enroll Year :</small> <?php echo $row->enroll_year;?> </h3> <hr />

                        </div>


        </div><!-- end of jumbotron1-->


</div><!-- this div sidePage containe ends -->

      <?php
    addFooter();
   ?>



<!-- SCRIPTS Starts -->
 <?php
//this will load the essential bootstrap js files
 loadBootstrapJs();
?>
    <script type="text/javascript" src="../js/adminDash.js"></script>

          <script>

           function w3_open() {
                 document.getElementById("mySidenav").style.display = "block";

             }
                function w3_close() {
                    document.getElementById("mySidenav").style.display = "none";
                 }


              // loadiner spinner functions
                        var myVar;

                        function myFunction() {
                            myVar = setTimeout(showPage, 1000);

                        }

                        function showPage() {
                          document.getElementById("loader").style.display = "none";
                          document.getElementById("myDiv").style.display = "block";
                        }
               //end loadiner spinner

 function LoadByAjax(divID,fileName){

  var xmlHttp = new XMLHttpRequest();
  xmlHttp.onreadystatechange = function(){
               if(xmlHttp.readyState == 4 && xmlHttp.status==200){
                   document.getElementById(divID).innerHTML = xmlHttp.responseText;
               }
           };

           xmlHttp.open('GET',fileName,true);
           xmlHttp.send();
 }

  </script>
 </body>
</html>
<?php
 }//if admin
else{
   $_SESSION['name']="";
 session_destroy();
 header("Location: ../index.php");
}
?>
