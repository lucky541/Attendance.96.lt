<?php
error_reporting(E_ALL);
include '../db/connection.php';

if(isset($_GET['enroll_no']) && isset($_GET['newNote'])){
  $enroll_no= $_GET['enroll_no'];
  $newNote= $_GET['newNote'];
  
  $dbConnection->query("INSERT INTO notes(enroll_no,note) VALUES('{$enroll_no}','{$newNote}')");
  
}
?>