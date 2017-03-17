<?php
include '../db/connection.php';
include '../sideNav.php';
 include '../Bootstrap.php';
   include "../notes/Notes.php";
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
  $enroll_no = $_SESSION['enroll_no'];
  $date = date('Y-m-d');

 // to mark the faculty attendance
 $markAttendance = "SELECT * FROM facultiesattendance WHERE enroll_no = '{$enroll_no}'";
 $resultset = $dbConnection->query($markAttendance);
   $row= $resultset->fetch_object();
   $fetchedDate= $row->date;
   $attendance=$row->attendance;
   if($date!= $fetchedDate){
     $attendance+=1;
      $markAttendance = "UPDATE facultiesattendance SET attendance={$attendance}, date='{$date}' WHERE enroll_no= '{$enroll_no}'";
      $dbConnection->query($markAttendance);

   }

$enroll_no=$_SESSION['enroll_no'];
   $resultset = $dbConnection->query("SELECT seen FROM facultynotification WHERE send_to = '{$enroll_no}' and seen=0");

        $no=0;
        while($row=$resultset->fetch_object()){
          $no+=1;
        }

?>

<link href="../css/TeacherDash.css" rel="stylesheet" />
<link rel="stylesheet" href="../css/w3Css.css">

 <style>

.showME{
  box-shadow:0 0 3px lightgray;
  max-height:250px;
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

<div id="loader">
  <center id="loading" class="blue-text">
  <i class="fa fa-spinner fa-spin fa-4x fa-fw"></i>
   <span class="sr-only">Loading...</span>
 </center>
</div>

<div style="display:none;" id="myDiv" class="view">


<?php
  $sideNavArray = array('Notes'=>'#note',
            'Schedule'=>'#schedule',
            'Attendance'=>'#attendance',
            'Detention'=>'#detention',
            'Option1'=>'#','Option2'=>'#','Option3'=>'#','Option4'=>'#',
             'Log Out'=>'../logMeOut.php');
addSideNav($sideNavArray,'#note');
$toNotifyStudent=array();


  ?>

        <!-- Purple Header
        <div class="edge-header" id="note">
        </div> -->

        <div class="col-md-11">

    <br /><hr />
 <br/>
                    <!--Welcome Jumbotron-->
                    <div class="jumbotron row" id="note">

                    <div id="myDIV" class="header col-sm-6" >
                    <h3 class="h3-responsive blue-text">Welcome <?php echo  $_SESSION['username'];?>

                    <small>
                     <a id="bell" onclick="showNotification('<?php echo $no;?>')" data-toggle="" title="" data-placement="" >
                      <i class="fa fa-bell-o blue-text" aria-hidden="true"></i>
                       <?php
                         if($no>0)
                          echo "<span id='bage' class='badge'>".$no."</span>"
                       ?>
                    </a>
                     </small>
                   </h3>
                     <div id="noti" style="display:none;"><?php echo  $_SESSION['enroll_no'];?></div>
                      <!--notification will be load by ajax-->
                      <div id="showNoti" class="showME"></div>

                    <p class="lead">Date       : <?php  echo date('d/m/Y');?> <br />
                                    Day        :  <?php echo jddayofweek ( cal_to_jd(CAL_GREGORIAN, date("m"),date("d"), date("Y")) , 1 ); ?>
                                    <br />Attendance :  <?php  echo $attendance;?>

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
                    <h3 class="h3-responsive">#Your Schedule</h3><hr />
                    <center><img src="../img/schedule.jpg"  class="img-responsive" style="height:auto;"> </center>
                    </div>



    <br /><hr />
    <br/>
                    <!--Attendance Jumbotron-->
                    <div class="jumbotron row" id="attendance">
                    <h3 class="h3-responsive">#Attendance</h3><hr />
                        <!--.Panel-->
                     <div class="col-sm-1"></div>
                          <!--Panel1-->
                          <div class="card col-sm-10 hoverable">
                              <h3 class="card-header info-color white-text">Take Attendance</h3>
                              <div class="card-block">
                              <h4 class="card-title">Attendance</h4>
                              <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                              <a class="btn btn-info" href="TakeAttendance.php">Take</a>
                          </div>
                     <!--/.Panel

                  <div class="col-sm-1"></div>

                      <div class="col-sm-1"></div>
                    <!--Panel1
                    <div class="card col-sm-4 hoverable">
                    <h3 class="card-header primary-color white-text">Take Attendance</h3>
                    <div class="card-block">
                    <h4 class="card-title">Take</h4>
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    <a class="btn btn-primary" href="TakeAttendance.php">Take</a>
                    </div>-->
                    </div>

                    </div><!--/. Attendance Jumbotron-->


                      <br /><hr />
                      <br/>
                    <!--Detention Jumbotron-->
                    <div class="jumbotron row" id="detention">
                    <h3 class="h3-responsive">#Detention</h3><hr />

                      <div class="col-sm-1"></div>
                          <!--Panel1-->
                          <div class="card col-sm-10 hoverable">
                              <h3 class="card-header primary-color white-text">Detention</h3>
                              <div class="card-block">
                              <h4 class="card-title">Set Detention Criteria</h4>
                              <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                              <a class="btn btn-primary" href="DetensionList.php">Set</a>
                          </div>
                     <!--/.Panel-->

                  <div class="col-sm-1"></div>

                    </div><!--/. Attendance Jumbotron-->

        </div>


</div><!-- this div sidePage containe ends -->
    </div>
   <?php
    addFooter();
   ?>

</div>




<!-- SCRIPTS Starts -->
<?php
//this will load the essential bootstrap js files
 loadBootstrapJs();
?>
    <script type="text/javascript" src="../js/adminDash.js"></script>

          <script>


  $(document).ready(function(){
 // Popovers Initialization

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

function LoadByAjax(divID,fileName){
//  alert(fileName)
  var xmlHttp = new XMLHttpRequest();
  xmlHttp.onreadystatechange = function(){
               if(xmlHttp.readyState == 4 && xmlHttp.status==200){
                   document.getElementById(divID).innerHTML = xmlHttp.responseText;
               }
           };

           xmlHttp.open('GET',fileName,true);
           xmlHttp.send();
 }


function showNotification(limit){
 // $("#bell").click(function(){
     //$('#noti').toggle(function(){
     // $('#noti').html('<div style ="max-height:250px; overflow-y:scroll;" class="card card-block" >    <h4 class="card-title">Panel title</h4>    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card content.</p>  <a href="#" //class="card-link">Card link</a><a href="#" class="card-link">Another link</a></div>')
     // $('[data-toggle="popover"]').popover()
    //     if(limit==0)
     //  limit=2;
     $('#showNoti').toggle();
     facultyId= $('#noti').text()
     LoadByAjax('showNoti','../notification/loadNotification.php?facultyId='+facultyId+'&tableName=facultynotification');
 // });
}
/*

function LoadByAjax(divID,fileName){

  var xmlHttp = new XMLHttpRequest();
  xmlHttp.onreadystatechange = function(){
               if(xmlHttp.readyState == 4 && xmlHttp.status==200){

                    // $('#bell').attr('data-content',xmlHttp.responseText);
                   document.getElementById('showNoti').innerHTML = xmlHttp.responseText;
                   //  document.getElementById('showNoti').innerHTMl=xmlHttp.responseText;
               //  alert(xmlHttp.responseText);
                 }
           };

           xmlHttp.open('GET',fileName,true);
           xmlHttp.send();
 }/*
*/
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
