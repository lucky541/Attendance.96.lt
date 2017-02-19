<?php
error_reporting(0);
 include 'db/connection.php';
  session_start();

if( isset($_POST['input_username']) && isset($_POST['input_password']) ){
    $input_username = $_POST['input_username'];
    $input_password = $_POST['input_password'];

     $validateUserQuery= "SELECT * FROM valid_users_list WHERE enroll_no ='{$input_username}' 
                          AND password = '{$input_password}'";
     if($resultSet = $dbConnection->query($validateUserQuery)){
        if($row = $resultSet->num_rows){
          
            $row = $resultSet->fetch_object();
               
                 

              $_SESSION['username']= $row->username;
              $_SESSION['enroll_no']= $row->enroll_no;
              $_SESSION['department']= $row->department;
               $role =   $_SESSION['role']= $row->role;
             
                if( !strcmp($role,'teacher') ){
                 $_SESSION['getMessage']="";
                 $_SESSION['defaultCheckBoxValue']="checked";
                  header('Location: faculty/index.php');
                }

                 if( !strcmp($role,'student') ){
                     $_SESSION['studing_year']= $row->studing_year;
                      $_SESSION['section']= $row->section;
                      $_SESSION['semester']= $row->semester;
                  header('Location: student/index.php');
                }

                 if( !strcmp($role,'admin') ){
                 
                 header('Location: admin/index.php');
                }
     
        }else{ 
            header("Location: index.php?message=not vallid");
        }
     }                     

   }
?>