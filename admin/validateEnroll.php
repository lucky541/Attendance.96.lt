
<?php
error_reporting(0);
include '../db/connection.php';
  if( isset($_GET['enroll']) ){
      $enroll = $_GET['enroll'];
      if(!empty($enroll)){
          
      $sql = "SELECT enroll_no FROM valid_users_list WHERE enroll_no LIKE '{$enroll}%'";
      $resultSet = $dbConnection->query($sql);
      while($row = $resultSet->fetch_object()){
          echo $row->enroll_no." > ";
      }  
      }
  }
  ?>