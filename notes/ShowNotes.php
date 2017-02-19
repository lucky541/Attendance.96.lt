<?php
 error_reporting(E_ALL);
  require '../db/connection.php';
 if(isset($_GET['enroll_no'])){
 	$note="";
     $enroll_no=$_GET['enroll_no'];
  $resultSet= $dbConnection->query("SELECT notesID,note FROM notes WHERE enroll_no='{$enroll_no}'");
  while ($row= $resultSet->fetch_object()) {
  	   $note= "<li>".$row->note."<a class='close' onclick='closeIt(".$row->notesID.")'>&times</a></li>".$note;
  }
 echo $note; 	
 }

?>