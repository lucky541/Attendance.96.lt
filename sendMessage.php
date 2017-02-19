<?php
  include 'db/connection.php';

  if( isset($_POST['emailId']) && isset($_POST['subject']) && isset($_POST['message'])){
  	 $emailId = $_POST['emailId'];
  	 $subject = $_POST['subject'];
  	 $message = $_POST['message'];
     $date=date('d/m/Y');   
   
    $dbConnection->query("INSERT INTO contacted VALUES('{$emailId}','{$subject}','{$message}','{$date}',0)");
  }
   header("Location: index.php");
?>