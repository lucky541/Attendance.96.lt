
<?php
   include '../db/connection.php';

   
    echo '<h4 class="h4-responsive blue-text ">Dention Notification</h4>';

    if( isset($_GET['enroll_id']) ){
        $enroll_id=$_GET['enroll_id'];

        $text="";
         $resultSet=$dbConnection->query("SELECT seen FROM detension_list WHERE enroll = '{$enroll_id}' AND seen=0");
          
         
           $fetchNNotifiaction= "SELECT * FROM detension_list WHERE enroll = '{$enroll_id}'";
         
     if($resultSet  = $dbConnection->query($fetchNNotifiaction)){
      
    $divColor='<div style="background-color:#f5f5f5">';
      while($row= $resultSet->fetch_object()){

               $text= $divColor.'<p class="text-muted">'.$row->tought_by.' -> '.$row->subject_code.' '.$row->date.' </p>
               <p>'.$row->message.'</p><hr /></div>'.$text;
          
      }
       $dbConnection->query("UPDATE detension_list SET seen = 1 WHERE enroll = '{$enroll_id}'"); 
        echo $text;
     }
     
    }

?>