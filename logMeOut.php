<?php
session_start();
$role = $_SESSION['name'];
 $_SESSION['name']="non";

 session_destroy();
 if(!strcmp($role,"admin")){
    $redirectTo="admin/AdminDash.php"; 
 }else if(!strcmp($role,"teacher")){
      $redirectTo="FacultyDash.php"; 
 }
 else if(!strcmp($role,"student")){
      $redirectTo="StudentDash.php"; 
 }
 else{
    $redirectTo="index.php";
 }
 header("Location: {$redirectTo}");
?>