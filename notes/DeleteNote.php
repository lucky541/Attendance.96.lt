<?php 
error_reporting(E_ALL);
require '../db/connection.php';

 if(isset($_GET['notesID'])){
 	$notesID=$_GET['notesID'];
 	$dbConnection->query("DELETE FROM notes WHERE notesID='{$notesID}'");
 }
?>