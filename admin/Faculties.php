<?php
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



 </head>  

<body onload="myFunction()" style="margin:0;">

<div id="loader"></div>

<div style="display:none;" id="myDiv">


<?php 
  $sideNavArray = array('Home'=>'index.php',
              'Notes'=>'index.php',
            'Faculties'=>'#',
             'Contacts'=>'Contacted.php',
              'Feedback'=>'ViewFeedback.php',
             'Log Out'=>'../logMeOut.php');
addSideNav($sideNavArray,'index.php'); 
  ?>

<div class="col-md-11 " style="height:700px; overflow-y:scroll;">
           
<!-- end of jumbotron1-->
    <div class="jumbotron ">
      <h4 class="h4-responsive"><b>#Faculties List</b></h4>
    <br/>
         <br /><hr /><br />
          <lable class="col-sm-4" >Filter By Department :
          </lable>
        <!-- Dropdown-->
        <select class="selectpicker col-sm-4 hoverable" >
         
        <option>View ALL</option>
        <option >CS</option>
        <option>IT</option>
        <option>E_TC</option>
        <option>E_I</option>
        </select>
       <br /><hr />
         
         <!-- TABLE WILL LOAD BY AJAX IN THIS DIV-->
          <div id ="loadedTable">
          </div>
   
 </div><!-- end of jumbotron1-->
        
   
</div><!-- this div sidePage containe ends -->



<!-- Modal -->
<div class="modal fade" style="padding:30px;" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <!--Content-->
        <div class="modal-content">
            <!--Header-->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Send Notification</h4>
            </div>
            <!--Body-->
            <div class="modal-body" >
                               <div class="md-form ">
                                        <i class="fa fa-envelope prefix" aria-hidden="true" style=" color:#33b5e5 "></i>
                                            <input type="email" id="form6" class="form-control" required>
                                        </div> 
                               
                                   <div class="md-form">
                                             <i class="fa fa-pencil prefix" aria-hidden="true" style=" color:#33b5e5 "></i>
                                                <textarea type="text" id="form8" class="md-textarea"></textarea>
                                                <label for="form8">Write to us</label>
                                            </div>
            <!--Footer-->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" onclick="sendNotification()" class="btn btn-primary" data-dismiss="modal">Send</button>
            </div>
        </div>
        <!--/.Content-->
    </div>
    
</div> </div>





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
  
  $('select').on('change', function (e) {
    
    var valueSelected = this.value;
     if(valueSelected === 'View ALL')
    {    LoadByAjax('loadedTable','FacultyTable.php');
    }else{
        
        LoadTable(valueSelected);
    }
});
  $('[data-toggle="tooltip"]').tooltip();
    LoadByAjax('loadedTable','FacultyTable.php');

});

function selectDept(str){
  if(str === 'View ALL')
    {    LoadByAjax('loadedTable','FacultyTable.php');
    }else{
        
        LoadTable(str);
    }
}

function LoadTable(dept){
    document.getElementById('loadedTable').innerHTML = dept;
     LoadByAjax('loadedTable','FacultyTable.php?dept='+dept);
      $(function () {
                    $('[data-toggle="tooltip"]').tooltip();
               });
}

function openNotificationForm(facultyId){
 $('#form6').val(facultyId);
 
}
function sendNotification(){
  sendTo = $('#form6').val();
  notification=$('#form8').val();
LoadByAjax('msg','../notification/sendNotfication.php?sentFrom=admin&sendTo='+sendTo+'&notification='+notification);
window.setTimeout(function(){
  alert('notification sent');
},2000);

}

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