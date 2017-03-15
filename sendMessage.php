<?php
  include 'db/connection.php';

  if( isset($_POST['emailId']) && isset($_POST['subject']) && isset($_POST['message'])){

   if($stmt = $dbConnection->prepare("INSERT INTO contacted VALUES(?,?,?,?,?)")){
     $stmt->bind_param('ssssb',$emailId,$subject,$message,$date,$seen);
     $emailId = $_POST['emailId'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
     $date=date('d/m/Y');
     $seen=0;

     $stmt->execute();
   }
  //  $dbConnection->query("INSERT INTO contacted VALUES('{$emailId}','{$subject}','{$message}','{$date}',0)");
  }
   header("Location: index.php");
?>
