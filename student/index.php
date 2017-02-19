<?php
include '../db/connection.php';
 include '../Bootstrap.php';
include '../sideNav.php';
   include "../notes/Notes.php";
 session_start();
   $role=$_SESSION['role'];
//check if user is admin then only show the below content
 if(!strcmp($role,'student')){                   
?>

<!DOCTYPE html>
<html>
<head>
  <title>AMS-Student</title>
      <meta name="viewport" content="width=device-width,initial-scale=1"/>
  <!-- Font Awesome -->
<?php
 // this will load the essential bootstrap files 
 loadBootstrapCSS();
?>
<link href="../css/TeacherDash.css" rel="stylesheet" />
<link rel="stylesheet" href="../css/w3Css.css">

 <style>   
.view {
background: url("../img/bg2.jpg") no-repeat center center fixed ;
 /*  background: url("img/bg1.jpg") no-repeat center center fixed;*/
        background-color: #2684db;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
} 

.showME{
  box-shadow:0 0 3px lightgray;
  max-height:300px;
  padding:10px;
  display:none;
  overflow-y:scroll;
}
.badge{
  background-color:gray;
  border-radius:20px;
  color:white;
  font-size:20px;
  padding:10px;
}
        </style>

 </head>  

<body onload="myFunction()" style="margin:0;">

<div id="loader"></div>

<div style="display:none;" id="myDiv" class="view">

<?php 
  $sideNavArray = array('Notes'=>'#note',
            'Schedule'=>'#schedule',
            'Attendance'=>'#attendance',
             'Option1'=>'#','Option2'=>'#','Option3'=>'#','Option4'=>'#',
             'Log Out'=>'../logMeOut.php');
   addSideNav($sideNavArray,'#note');

$enroll_no=$_SESSION['enroll_no'];
   $resultset = $dbConnection->query("SELECT seen FROM detension_list WHERE enroll = '{$enroll_no}' and seen=0");
     
        $no=mysqli_num_rows($resultset);
    $enroll_no = $_SESSION['enroll_no'];
                            $department=$_SESSION['department'];
                            $year= $_SESSION['studing_year'];
                            $section= $_SESSION['section'];
                             $semester=$_SESSION['semester'];
  ?>


        <div class="col-md-11">
                   
    <br /><hr />
 <br/> 
                    <!--Welcome Jumbotron-->
                    <div class="jumbotron row" id="note">

                   <div id="myDIV" class="header col-sm-6" >
                    <h1 class="h1-responsive">Welcome <?php echo  $_SESSION['username'];?>
                    
                    <small>  
                     <a id="bell" onclick="showNotification()" data-toggle="" title="" data-placement="" >
                      <i class="fa fa-bell-o" aria-hidden="true"></i> <span id='bage' class="badge">
                       <?php echo $no;?>
                      </span></a>
                     </small>
                    </h1>
                     <div id="noti" style="display:none;"><?php echo  $_SESSION['enroll_no'];?></div>
                      <!--notification will be load by ajax-->
                      <div id="showNoti" class="showME"></div>
                      
                     <?php
                        echo "<p class='lead'>Class : ".$year.'_'.$department.'_'.$section.'</p>';
                      ?>


                    <p class="lead">Date : <?php  echo date('d/m/Y');?> <br />
                                    Day :  <?php echo jddayofweek ( cal_to_jd(CAL_GREGORIAN, date("m"),date("d"), date("Y")) , 1 ); ?>
                  
                      
                   </p>
                    <!-- this will add the panel for input for notes-->
                    <?php
                        NotesInput();
                    ?>
                    </div><!--/.Welcome Jumbotron -->

    <br /><hr />
 <br/> 
                    <!-- Schedule container -->
                    <div class="jumbotron row" id="schedule">
                    <h2 class="h2-responsive">#Your Schedule</h2>  <hr />
                    <center><img src="../img/schedule.jpg"  class="img-responsive"> </center>
                    </div>

        

    <br /><hr />
 <br/> 
                    <!--Faculty Jumbotron-->
                    <div class="jumbotron row" id="attendance">
                    <h2 class="h2-responsive">#Attendance</h2> <hr />
                    <?php 
                    
                            
                            $FetchSubjectsQuery = "SELECT * FROM subject_table WHERE for_department = '{$department}' AND for_year = '{$year}'";
                            
                            $resultSet = $dbConnection->query($FetchSubjectsQuery);

                            if($resultSet->num_rows){
                             
                            while($row = $resultSet->fetch_object())
                            {  
                              ?>
                            <!--Panel1-->
                            <div class="card col-sm-3 hoverable">
                            <h3 class="card-header primary-color white-text">
                            <?php     echo $row->subject_name; ?>
                            </h3>
                            <div class="card-block">
                            <h4 class="card-title"> <?php   echo "Subject Code :".$row->subject_code; ?></h4>
                             
                             <?php  
                            
                            //fetching attendance
                            $FetchSubjectsAttendanceQuery = "SELECT * FROM {$row->subject_code} WHERE enroll_no = '{$enroll_no}'";
                            if($fetchAttendance = $dbConnection->query($FetchSubjectsAttendanceQuery)){
                            if($attendanceRow = $fetchAttendance->fetch_object()){

                            ?>
                            <p class="card-text">
                             <?php
                                 echo "Attendance : <b>".$attendanceRow->attendance."</b><br />";
                                 }
                                } 
                              echo 'Tought By : '.$row->tought_by."<br/><br/>";
                           
                             ?>
                            </p>
                            </div>
                            </div>
                             <div class=" col-sm-1"></div>
                             <?php
                             }
                               }
                        
                        ?>
                 


</div><!-- this div sidePage containe ends -->
    </div>
</div>
   <?php
    addFooter();
   ?>



     
<!-- SCRIPTS Starts -->
   <!-- JQuery -->
<?php
//this will load the essential bootstrap js files
 loadBootstrapJs();
?>
    <script type="text/javascript" src="../js/adminDash.js"></script>

          <script>
          
  $(document).ready(function(){
  
loadNotes('<?php echo $_SESSION['enroll_no'] ?>');
});

function AddNotes(){
 enroll_no= '<?php echo $_SESSION['enroll_no'] ?>';
 //alert(enroll_no)
  newNote=$('#myNewNote').val();
 if(newNote==''){
  alert('emplty note')
 }else{
  $('#myNewNote').val('');
  LoadByAjax('','../notes/AddNotes.php?enroll_no='+enroll_no+'&newNote='+newNote);
   loadNotes(enroll_no);
  loadNotes(enroll_no);
 }
}

function loadNotes(enroll_no){
   LoadByAjax('myUL','../notes/ShowNotes.php?enroll_no='+enroll_no);
}
function closeIt(notesID){
  //alert(notesID)
  LoadByAjax('','../notes/DeleteNote.php?notesID='+notesID);
   loadNotes('<?php echo $_SESSION['enroll_no'] ?>');
    loadNotes('<?php echo $_SESSION['enroll_no'] ?>');
}
function showNotification(){

     $('#showNoti').toggle();
     enroll_id= $('#noti').text()
     LoadByAjax('showNoti','loadNotification.php?enroll_id='+enroll_id); 
}

function LoadByAjax(divID,fileName){
 //alert(fileName);
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
   $_SESSION['name']="non";
 session_destroy();
 header("Location: ../index.php");
}
?>