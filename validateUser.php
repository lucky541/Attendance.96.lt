<?php
//error_reporting(0);
 include 'db/connection.php';
  session_start();

if( isset($_POST['input_username']) && isset($_POST['input_password']) ){
    $input_username = $_POST['input_username'];
    $input_password = $_POST['input_password'];

    if($stmt = $dbConnection->prepare("SELECT username,enroll_no,department,role,studing_year,section,semester FROM valid_users_list WHERE enroll_no =?
                         AND password = ?")){

    $stmt->bind_param('ss',$input_username,$input_password);
    $stmt->execute();
    $stmt->bind_result($username,$enroll_no,$department,$role,$studing_year,$section,$semester);
    $stmt->fetch();

   $_SESSION['username']= $username;
   $_SESSION['enroll_no']= $enroll_no;
   $_SESSION['department']= $department;
    $role =   $_SESSION['role']= $role;

     if( !strcmp($role,'teacher') ){
      $_SESSION['getMessage']="";
      $_SESSION['defaultCheckBoxValue']="checked";
       header('Location: faculty/index.php');
     }

      if( !strcmp($role,'student') ){
          $_SESSION['studing_year']= $studing_year;
           $_SESSION['section']= $section;
           $_SESSION['semester']= $semester;
       header('Location: student/index.php');
     }

      if( !strcmp($role,'admin') ){
      header('Location: admin/index.php');
     }

  }
}
else{
 header("Location: index.php?message=not vallid");
}

?>
