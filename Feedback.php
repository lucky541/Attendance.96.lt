<?php
include 'db/connection.php';
 if( isset($_POST['name']) && isset($_POST['feedback'])){
  $seen=0;
    $stmt=$dbConnection->prepare("INSERT INTO feedback  VALUES (?,?,?,?)");
       $stmt->bind_param('sssb',$name,$feedback,$date,$seen);
       $name=$_POST['name'];
      	$feedback= $_POST['feedback'];
      	$date = date('d/m/Y');
         $stmt->execute();

  //  $dbConnection->query("INSERT INTO feedback VALUES('{$name}','{$feedback}','{$date}',0)");
 }
header("Location: index.php");
?>
