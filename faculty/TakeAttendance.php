
<?php
include '../sideNav.php';
include '../Bootstrap.php';
 session_start();
   $role=$_SESSION['role'];
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

<link href="../css/checkBoxStyle.css" rel="stylesheet" />
<link rel="stylesheet" href="../css/w3Css.css">

 <style>
          
          /* The snackbar - position it at the bottom and in the middle of the screen */
#snackbar {
    visibility: hidden; /* Hidden by default. Visible on click */
    min-width: 250px; /* Set a default minimum width */
    margin-left: -125px; /* Divide value of min-width by 2 */
    background-color: #333; /* Black background color */
    color: #fff; /* White text color */
    text-align: center; /* Centered text */
    border-radius: 2px; /* Rounded borders */
    padding: 16px; /* Padding */
    position: fixed; /* Sit on top of the screen */
    z-index: 1; /* Add a z-index if needed */
    left: 50%; /* Center the snackbar */
    bottom: 30px; /* 30px from the bottom */
}

/* Show the snackbar when clicking on a button (class added with JavaScript) */
#snackbar.show {
    visibility: visible; /* Show the snackbar */

/* Add animation: Take 0.5 seconds to fade in and out the snackbar. 
However, delay the fade out process for 2.5 seconds */
    -webkit-animation: fadein 0.5s, fadeout 0.5s 2.5s;
    animation: fadein 0.5s, fadeout 0.5s 2.5s;
}

/* Animations to fade the snackbar in and out */
@-webkit-keyframes fadein {
    from {bottom: 0; opacity: 0;} 
    to {bottom: 30px; opacity: 1;}
}

@keyframes fadein {
    from {bottom: 0; opacity: 0;}
    to {bottom: 30px; opacity: 1;}
}

@-webkit-keyframes fadeout {
    from {bottom: 30px; opacity: 1;} 
    to {bottom: 0; opacity: 0;}
}

@keyframes fadeout {
    from {bottom: 30px; opacity: 1;}
    to {bottom: 0; opacity: 0;}
}.chip {
    display: inline-block;
    padding: 0 25px;
    height: 50px;
    font-size: 16px;
    line-height: 50px;
    border-radius: 25px;
    background-color: #f1f1f1;
}

.chip img {
    float: left;
    margin: 0 10px 0 -25px;
    height: 50px;
    width: 50px;
    border-radius: 50%;
}

        </style>

      

 </head>  

<body onload="myFunction()" style="margin:0;">

<div id="loader"></div>

<div style="display:none;" id="myDiv">

<?php 
  $sideNavArray = array('Home'=>'index.php',
            'Notes'=>'index.php',
            'Schedule'=>'index.php',
            'Attendance'=>'#Attendance',
            'DetentionList'=>'DetensionList.php',
             'Log Out'=>'../logMeOut.php');
addSideNav($sideNavArray,'index.php'); 
  ?>

 <br />
    <br/>
<div class="col-sm-10">
    <div class="jumbotron ">
    <h3 class="h3-responsive" id="Attendance"><b>#Take Attendance</b></h3>
    <br />
    <hr />    
    <br/> 



<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <!--Content-->
        <div class="modal-content">
            <!--Header-->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Modal title</h4>
            </div>
            <!--Body-->
            <div class="modal-body">
                ...
            </div>
            <!--Footer-->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
        <!--/.Content-->
    </div>
</div>


    <!-- CLASS LIST WILL COME IN THIS DIV-->
    <div id="selectClassList" class="row"></div>
   <br />
    <hr />    
    <!--
<div class="green-text">
 </div> -->
    <!--IN THIS DIV TABLE  WILL LOADED VIA A AJAX -->
    <div id ="loadTable"></div>
</div>

  <div id="editAttendance">
  </div>

<div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content" id="content">
      ...
    </div>
  </div>
</div>

</div><!-- end of jumbotron1-->


<!-- SCRIPTS Starts -->
<?php
//this will load the essential bootstrap js files
 loadBootstrapJs();
?>
    
    <script type="text/javascript" src="../js/adminDash.js"></script>

          <script>

   function showme(str){
      document.getElementById('content').innerHTML=str;

   }
               

  $(document).ready(function(){
   
 loadThisToo();
 
});

function loadThisToo(){
 
          LoadByAjax('selectClassList','files.php');
}
var section;
 function loadTableForSectionA(section){
     this.section=section;
       LoadByAjax('loadTable','Section_A.php?value=checked');
 }

 function loadTableForSectionB(section){
       this.section=section;
       LoadByAjax('loadTable','Section_B.php?value=checked');
       
 }

function callEditAttendance(section){
 // alert(section);
  LoadByAjax('loadTable','editAttendance.php?section='+section);
}

function viewAttendance(section){
  //alert('viewAttendance()')
  LoadByAjax('loadTable','ViewAttendance.php?section='+section);
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
function callAlert(){
  alert("Attendance Marked Successfully..!");
}
function CheckboForSectionA(){
    var c=document.getElementById('checkbox0');
  if (c.checked) {
   LoadByAjax('loadTable','Section_A.php?value=checked');
  
  } else { 
  LoadByAjax('loadTable','Section_A.php?value=unchecked');
  }
}
 function CheckboForSectionB(){
    var c=document.getElementById('checkbox0');
  if (c.checked) {
   LoadByAjax('loadTable','Section_B.php?value=checked');
  
  } else { 
  LoadByAjax('loadTable','Section_B.php?value=unchecked');
  }
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