<?php
 include '../sideNav.php';
  include '../Bootstrap.php';
  include '../db/connection.php';
  include "../notes/Notes.php";
 session_start();
 error_reporting(0);
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

<link href="../css/TeacherDash.css" rel="stylesheet" />
<link rel="stylesheet" href="../css/w3Css.css">

 <style>


.badge{
  background-color:gray;
  border-radius:7px;
  color:white;
  font-size:10px;
  padding:7px;
}
  .addlightGray{
    background-color: #a1deff;
    padding:  10px 50px;

  }

        </style>

 </head>

<body onload="myFunction()" style="margin:0;" >

<div id="loader">
  <center id="loading" class="blue-text">
  <i class="fa fa-spinner fa-spin fa-5x fa-fw"></i>
   <span class="sr-only">Loading...</span>
  </center>
</div>

<div style="display:none;" id="myDiv" class="view">

<?php
$result = $dbConnection->query("SELECT seen FROM contacted WHERE seen =0");
 $contacted=mysqli_num_rows($result);
$result = $dbConnection->query("SELECT seen FROM feedback WHERE seen =0");
 $feedback=mysqli_num_rows($result);
  $sideNavArray = array(
            'Notes'=>'#note',
             'Faculties'=>'#faculty',
              'Feedback<span class="badge">'.$feedback.'</span>'=>'#feedback',
              'Contacts<span class="badge">'.$contacted.'</span>'=>'#contacts',

              'option1'=>'#','option2'=>'#','option3'=>'#','option4'=>'#',

            'Log Out'=>'../logMeOut.php');

 addSideNav($sideNavArray,'#note');


  ?>

        <div class="col-md-11">

    <hr />
 <br/>
                    <!--Welcome Jumbotron-->
                    <div class="jumbotron row" id="note">

                    <div id="myDIV" class="header col-sm-6" >
                    <h2 class="h2-responsive">Welcome <?php echo  $_SESSION['username'];?></h2>
                    <p class="lead">Date : <?php  echo date('d/m/Y');?> <br />
                                    Day :  <?php echo jddayofweek ( cal_to_jd(CAL_GREGORIAN, date("m"),date("d"), date("Y")) , 1 ); ?>
                   </p>

                   <!-- this will add the panel for input for notes-->
                    <?php

                        NotesInput();
                    ?>


                    </div><!--/.Welcome Jumbotron -->

    <hr />
 <br/>

                  <!--Faculty Jumbotron-->
                  <div class="jumbotron row" id="faculty">
                  <h3 class="h3-responsive">#Faculty</h3>
                   <hr />
                   <div class="col-sm-1"></div>
                  <!--Panel1-->
                  <div class="card col-sm-4 hoverable">
                  <h3 class="card-header primary-color white-text">Faculty Details</h3>
                  <div class="card-block">
                  <h4 class="card-title">Faculty Details</h4>
                  <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                  <a class="btn btn-primary" href="Faculties.php">Faculties</a>
                  </div>
                  </div>
                  <!--/.Panel-->
                  <div class="col-sm-1"></div>
                  <!--Panel2-->
                  <div class="card col-sm-4 hoverable">
                  <h3 class="card-header info-color white-text ">Add Faculty</h3>
                  <div class="card-block">
                  <h4 class="card-title">To Add New Faculty</h4>
                  <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                  <a class="btn info-color" href="AddFaculty.php">Add Faculty</a>
                  </div>
                  </div>
                  <!--/.Panel-->

                    <div class="col-sm-1"></div>

              </div>
    <hr />
 <br/>
         <div class="jumbotron row " id="feedback" >
                  <h3 class="h3-responsive">Feedbacks</h3>
                      <hr />
                     <?php
                     $text="";
                    $resultSet= $dbConnection->query("SELECT * FROM feedback where seen = 0  LIMIT 2");

                    if(!mysqli_num_rows($resultSet)){
                       $resultSet= $dbConnection->query("SELECT * FROM feedback  LIMIT 2");
                    }
                       while($row = $resultSet->fetch_object()){
                        $text= '<div class="addlightGray z-depth-1">
                              <h4 class=" h4-responsive">'.$row->name.'</h4>
                             <hr />  <p>'.$row->feedback.'</p>
                             <p class=" text-xs-right">'.$row->date.'</p>
                              </div>
                              <br />'.$text;
                       }
                        echo $text;

                     ?>
                        <a class="blue-text " href="ViewFeedback.php"> show more </a>
                  </div><!--/. Faculty Jumbotron-->

     <hr />
 <br />
    <div class="jumbotron row " id="contacts">
                  <h3 class="h3-responsive">Contacts Queries</h3>
                      <hr />
                     <?php
                     $text="";
                    $resultSet= $dbConnection->query("SELECT * FROM contacted where seen = 0  LIMIT 3");
                    if(!mysqli_num_rows($resultSet)){
                        $resultSet= $dbConnection->query("SELECT * FROM contacted LIMIT 2");

                    }
                       while($row = $resultSet->fetch_object()){
                        $text= '<div class="addlightGray z-depth-1">
                              <h3 class="h3-responsive">#'.$row->subject.'</h3><hr />
                               <p>'.$row->message.'</p>
                               <div class=" text-xs-right">'.$row->email." ".$row->date.'</div>
                            </div>
                              <br />'.$text;
                       }
                        echo $text;

                     ?>
                       <a class="blue-text " href="Contacted.php"> show more </a>
                  </div><!--/. Faculty Jumbotron-->

     <hr />

</div><!-- this div sidePage containe ends -->
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


$(function(){
  enroll_no= '<?php echo $_SESSION['enroll_no'] ?>';
 loadNotes(enroll_no);
})
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
