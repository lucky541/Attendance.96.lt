<?php
include 'db/connection.php';
 if( isset($_POST['name']) && isset($_POST['feedback'])){

 	$name=$_POST['name'];
 	$feedback= $_POST['feedback'];
 	$date = date('d/m/Y');
    $dbConnection->query("INSERT INTO feedback VALUES('{$name}','{$feedback}','{$date}',0)");
 }
header("Location: index.php");
?>