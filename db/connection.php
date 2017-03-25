<?php
  
  $dbConnection = new mysqli('localhost','root','','amsdatabase');
  
  if($dbConnection->connect_error){
      die($dbConnection->connect_error);
  }else{
    
  }

?>
