<?php
include '../sideNav.php';
 session_start();
    $role=$_SESSION['role'];
     include '../Bootstrap.php';
//check if user is admin then only show the below content
 if(!strcmp($role,'teacher')){
?>

<!DOCTYPE html>
<html>
<head>
	<title>AMS-Faculty</title>
<?php
 // this will load the essential bootstrap files
 loadBootstrapCSS();
?>
<link href="../css/TakeAttendance.css" rel="stylesheet" />
<link href="../css/CheckBoxStyle.css" rel="stylesheet" />
<link rel="stylesheet" href="../css/w3Css.css">

  <meta name="viewport" content="width=device-width,initial-scale=1"/>
 <style>


        </style>

 </head>

<body onload="myFunction()" style="margin:0;">

<div id="loader">
  <center id="loading" class="blue-text">
  <i class="fa fa-spinner fa-spin fa-4x fa-fw"></i>
   <span class="sr-only">Loading...</span>
 </center>
</div>

<div style="display:none;" id="myDiv">

<?php
  $sideNavArray = array('Home'=>'index.php',
            'Notes'=>'index.php',
            'Schedule'=>'index.php',
            'Attendance'=>'TakeAttendance.php',
            'DetentionList'=>'#Detention',
             'Log Out'=>'../logMeOut.php');
addSideNav($sideNavArray,'index.php');
  ?>

 <br />
    <br/>
<div class="col-sm-10">
    <div class="jumbotron ">
    <h3 class="h3-responsive" id="Detention"><b>#Detention List</b></h3>
    <hr />

    <!-- CLASS LIST WILL COME IN THIS DIV-->
    <div id="selectClassList" class="row"></div>
   <br />

    <!--IN THIS DIV TABLE  WILL LOADED VIA A AJAX -->
    <div id ="loadTable"></div>
</div>

<div id="notification"></div>

</div><!-- end of jumbotron1-->


<!-- SCRIPTS Starts -->
<?php
//this will load the essential bootstrap js files
 loadBootstrapJs();
?>

    <script type="text/javascript" src="../js/adminDash.js"></script>

          <script>

  $(document).ready(function(){

  criterial=0;  this.section='';

 loadThisToo();
});
function selectDept(criterial){
     this.criterial=criterial;
    if(criterial!=''){
    if(section==='A'){
      LoadByAjax('loadTable','Detention_For_Section_A.php?criterial='+criterial);
    }else{
       LoadByAjax('loadTable','Detention_For_Section_B.php?criterial='+criterial);
    }
    }else{
      alert('no classes found');
    }
}

// give classes available for the faculty
function loadThisToo(){
          LoadByAjax('selectClassList','files.php');

}
 function loadTableForSectionA(){
       this.section = 'A';
       LoadByAjax('loadTable','Detention_For_Section_A.php');
       $('select').val(criterial)

 }

 function loadTableForSectionB(){
         this.section = 'B';
       LoadByAjax('loadTable','Detention_For_Section_B.php');
 }

function submitAttendance(){
  alert('submitAttendance');
}

function sendNotification(){
 LoadByAjax('notification','NotifyStudents.php?notify=set');
 setTimeout(function(){
  alert("notification send")
  location.reload();
 },500);

}

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
