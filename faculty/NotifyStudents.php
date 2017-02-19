<?php
include '../db/connection.php';
  session_start();
if(isset($_GET['notify'])){
	
$toNoti=$_SESSION['toNotifyStudent'];
 $arrlength = count($toNoti);
 $sub_code= $_SESSION['subject_name'].'('.$_SESSION['subject_code'].')';
 $date= date("d/m/Y");
$message="Due to low attendance in <b>{$sub_code}</b> you are not eligible for the exam";
  $tought_by=$_SESSION['enroll_no'];
for($x = 0; $x < $arrlength; $x++) {
    $enroll_no = $toNoti[$x];
   
   $dbConnection->query("INSERT INTO `detension_list`(`enroll`, `message`, `date`, `subject_code`, `tought_by`, `seen`) 
   	              VALUES ('{$enroll_no}','{$message}','{$date}','{$sub_code}','{$tought_by}',0)");
   }
}
 
?>