
<?php
   include '../db/connection.php';

   
    echo '<h3 class="h3-responsive blue-text ">Notification</h3>';
    if( isset($_GET['facultyId']) && isset($_GET['tableName']) ){
        $facultyID=$_GET['facultyId'];
         $tableName=$_GET['tableName'];
           $text="";
         $resultSet=$dbConnection->query("SELECT seen FROM {$tableName} WHERE send_to = '{$facultyID}' AND seen=0");
           $notseen=mysqli_num_rows($resultSet);
           //echo "not seen  = ".$notseen;
         
           $fetchNNotifiaction= "SELECT * FROM {$tableName} WHERE send_to = '{$facultyID}'";
         
      if($resultSet  = $dbConnection->query($fetchNNotifiaction)){
    $divColor='<div style="background-color:#f5f5f5; padding:5px;">';
      while($row= $resultSet->fetch_object()){
          /*   echo "not seen  = ".$notseen;
         
         /*   if($notseen > 0){
              $notseen-=1;
              $divColor='<div style="background-color:#f5f5f5"> true'.$notseen;
            }else{
              $divColor='<div style="background-color:lightgray">false'.$notseen;
            } */
           $text= $divColor.$row->notification.'<p class="text-muted text-xs-right">-'.$row->send_from.' '.$row->date.' seen </p></div><br />'.$text;
          
      }
       $dbConnection->query("UPDATE {$tableName} SET seen = 1 WHERE send_to = '{$facultyID}'"); 
        echo $text;
    }
}
?>