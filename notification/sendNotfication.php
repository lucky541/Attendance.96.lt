<?php
 error_reporting(E_ALL);
 require '../db/connection.php';
 if( isset($_GET['sentFrom']) && isset($_GET['sendTo']) && isset($_GET['notification']) ){
   $sendTo=$_GET['sendTo'];
   $sendFrom=$_GET['sentFrom'];
   $notification=$_GET['notification'];
   $date = date('Y-m-d');
   echo  $sendFrom;
  $dbConnection->query("INSERT INTO facultynotification values('{$sendFrom}','{$sendTo}','{$notification}',0,'{$date}')");

 }
?>