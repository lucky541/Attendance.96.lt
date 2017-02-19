<?php
include '../sideNav.php';
include '../db/connection.php';
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

<style type="text/css">
  .addlightGray{
    background-color: #a1deff;
    padding:  10px 50px;

  }
</style>

 </head>  

<body onload="myFunction()" style="margin:0;">

<div id="loader"></div>

<div style="display:none;" id="myDiv">


<?php 
  $sideNavArray = array('Home'=>'index.php',
             'Home'=>'index.php',
              'Notes'=>'index.php',
            'Faculties'=>'Faculties.php',
            'Contacts'=>'#contacted',
              'Feedback'=>'ViewFeedback.php',
             'Log Out'=>'../logMeOut.php');
addSideNav($sideNavArray,'index.php'); 
?>
   <!--Faculty Jumbotron-->

                  <div class="jumbotron row " id="contacted">
                  <h2 class="h2-responsive">Contact Queries</h2>
                      <hr />
                     <?php
                     $text="";
                    $resultSet= $dbConnection->query("SELECT `email`, `subject`, `message`, `date` FROM `contacted` WHERE 1");
                       while($row = $resultSet->fetch_object()){ 
                        $text= '<div class="addlightGray z-depth-1">
                              <h3 class=" h3-responsive">'.$row->subject.'</h3>
                               <hr /><p>'.$row->message.'</p>
                               <p class="text-xs-right">'.$row->email." ".$row->date.'</p>
                            </div>
                              <hr />'.$text;
                       }
                        echo $text;
                      $dbConnection->query("UPDATE contacted set seen =1 WHERE 1");
                     ?>
                        
                  </div><!--/. Faculty Jumbotron-->

   
      <?php
    addFooter();
   ?>
     
</div><!-- this div sidePage containe ends -->


 </div>


     
<!-- SCRIPTS Starts -->
<?php
//this will load the essential bootstrap js files
 loadBootstrapJs();
?>
    <script type="text/javascript" src="../js/adminDash.js"></script>
 
          <script>
           
 function LoadByAjax(divID,fileName){
 // alert(fileName)
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

