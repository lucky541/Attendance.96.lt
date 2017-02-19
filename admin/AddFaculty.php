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

<link href="../css/TeacherDash.css" rel="stylesheet" />
<link rel="stylesheet" href="../css/w3Css.css">

 <style>
         
          .blueIcon{
            color: #2684db;
          }
          .Add-box-shadow{
          box-shadow:0 0 10px gray;
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
           
            'Contacts'=>'Contacted.php',
              'Feedback'=>'ViewFeedback.php',
             'Log Out'=>'../logMeOut.php');
addSideNav($sideNavArray,'index.php'); 
  ?>

 <div class="col-md-12">
         
                      <div class="edge-header" style="background-color: #2684db;"></div>

                        <!-- Main Container -->
                        <div class=" free-bird container-fluid">
                        <div class="row">
                        <div class="col-md-8 col-lg-7 mx-auto float-xs-none white z-depth-1 py-2 px-2">
                        <h2 class="h2-responsive">Enter Faculty Details</h2>
                          <p>This will add new faculty in the database and provide the login ID for him/her.</p>
                           <p><b>please DO NOT REFRESH THE PAGE.</b></p>
                        <!--Naked Form-->
                        <div class="card-block">

                        <!--Body-->
                        <form action="AddFaculty.php" method="post">

                        <h5 class="h5-responsive">Basic Informations</h5>
                             
                        <div class="md-form">
                        <i class="fa fa-user-plus prefix blueIcon"></i>
                        <input type="text" id="form1" class="form-control" name="faculty_name" required >
                        <label for="form1">Full Name</label>
                        </div>
                        
                        <!--Enroll  validation-->
                        <h5 class="h5-responsive">Enroll No.</h5>
                        <div class="md-form">
                        <i class="fa fa-envelope prefix blueIcon"></i>
                        <input type="text" id="form2" class="form-control " onkeyup="checkEnroll(this.value)" name="faculty_enroll" required>
                        <label for="form2" data-error="wrong" data-success="right">Enroll No.</label>
                          
                         
                            <div id="message" ></div>
                           
                        </div>
                        
                        <!--Dept validation-->
                        <h5 class="h5-responsive">Department</h5>
                        <div class="md-form" style="margin-left:50px; ">
                        <select class="selectpicker " style="width:60%" name="faculty_dept" required>
                           <option>select dept.</option>
                            <option >CS</option>
                            <option>IT</option>
                            <option>E_TC</option>
                            <option>E_I</option>
                            </select>
                       </div>
                    
                     <!--Enroll  validation-->
                        <h5 class="h5-responsive">Assign Subject</h5>
                        <div class="md-form">
                        <i class="fa fa-envelope prefix blueIcon"></i>
                        <input type="text" id="form7" class="form-control " name="assigned_subjet" required>
                        <label for="form7" data-error="wrong" data-success="right">subject code</label>
                         
                        <!--Email validation-->
                        <h5 class="h5-responsive">Temporary Password</h5>
                        <div class="md-form">
                        <i class="fa fa-lock prefix blueIcon" ></i>
                        <input type="text" id="form4" class="form-control validate" name="faculty_password" required>
                        <label for="form4" data-error="wrong" data-success="right">Temporary Password</label>
                        </div>
                        <div >
                        <button class="btn btn-primary">ADD</button>
                        </div>
                     </form>
                     </div>
                <!--Naked Form-->
                </div>
                </div>
                </div>
                <!-- /.Main Container -->

       </div><!-- this div sidePage containe ends -->


              
  
</div>

<?php
    addFooter();
   ?>
     
<!-- SCRIPTS Starts -->
<?php
//this will load the essential bootstrap js files
 loadBootstrapJs();
?>
    <script type="text/javascript" src="js/adminDash.js"></script>

          <script>
           
$(document).ready(function(){
  // Add smooth scrolling to all links
  $("a").on('click', function(event) {

    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {
      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      /*Assume that the current URL http://www.example.com/test.htm#part2: 
       var x = location.hash;
       
      The result of x will be: #part2
      */
      var hash = this.hash;

      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 700, function(){
   
        // Add hash (#) to URL when done scrolling (default click behavior)
        window.location.hash = hash;
      });
    } // End if
  });


});

 function checkEnroll(str){
    LoadByAjax('message','validateEnroll.php?enroll='+str);
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


  if( isset($_POST['faculty_name']) && isset($_POST['faculty_enroll']) && isset($_POST['assigned_subjet']) && isset($_POST['faculty_dept'])
       && isset($_POST['faculty_password']) && strcmp($_POST['faculty_dept'],'select dept.') ){
         $faculty_name  = $_POST['faculty_name'];
         $faculty_enroll = $_POST['faculty_enroll'];
         $faculty_dept = $_POST['faculty_dept'];
          $faculty_password= $_POST['faculty_password'];
          $assignedSubjetCode = $_POST['assigned_subjet'];
         $enroll_year= date('Y');
                                                      // 1            2          3          4           5              6       7        8      9
  $addFacultyQuery = "INSERT INTO valid_users_list (enroll_no, username, password, enroll_year, studing_year, department,semester,section, role) VALUES('{$faculty_enroll}','{$faculty_name}','{$faculty_password}',{$enroll_year},'NA','{$faculty_dept}','NA','NA','teacher')";
  
  $assignedSubject = "UPDATE subject_table SET tought_by = '{$faculty_enroll}' WHERE subject_code = '{$assignedSubjetCode}' 
                      AND for_department = '{$faculty_dept}'";
  $dbConnection->query($assignedSubject);

  if($dbConnection->query($addFacultyQuery) === TRUE){
     header('Location: AddFaculty.php');  
     }else{
       echo $dbConnection->error;
     }
   }
 
 }//if admin
else{
   $_SESSION['name']="";
 session_destroy();
 header("Location: ../index.php");
}
?>  