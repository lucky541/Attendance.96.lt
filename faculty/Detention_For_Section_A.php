<?php
   error_reporting(0);
  require '../db/connection.php';
  session_start();

  $subject_code = $_SESSION['subject_code'];
  $subject_name = $_SESSION['subject_name'];
  $mini_atte=0;
  if( isset($_GET['criterial'])){
     $mini_atte = $_GET['criterial'];
  }
    $toNotifyStudent=array();
  ?>

   <hr />
                <h3 class='h3-responsive'><?php
                        // print the no. of classes taken
                        $enroll_no =  $_SESSION['enroll_no'];
                        $updateClassHappens ="SELECT class_happens_in_a FROM subject_table WHERE tought_by = '{$enroll_no}' AND
                        subject_code = '{$subject_code}'";
                        if($getResultSet = $dbConnection->query($updateClassHappens)){
                        $getRow = $getResultSet->fetch_object();
                        $classesTaken = $getRow->class_happens_in_a;

                              echo "<h4><b class='blue-text'>".$_SESSION['for_sectionA']."</b><hr />".$_SESSION['subject_name']."<small class='green-text'> <b> (Classes Taken : ".
                                $classesTaken.")</b></small></h4>";


                             echo "<div class=' blue-text'><b>Select MCT : -</b> <select id='options' style='width:200px' onchange='selectDept(this.value)'>"; $options=0;
                             while($options <= $classesTaken){
                                    echo "<option>".$options."</option>";
                                    $options=$options+1;
                              }
                                  echo "</select></div><p class='text-muted'>MCT: Minimum Classes Taken</p>";

                      }


                ?></h3>

                <div class='my-2 blue-text'>
                <p style='font-weight:300;font-size:0.75rem'>Note : Landscape View Sugested.</p>
                </div>
     <form  >
         <div class='table-responsive' >

                <table class='table table-striped ' >
                <thead>
                <tr>
                <th>S.N.</th>
                <th>Enroll_No.</th>
                <th class='red-text'>Atten.<?php echo '<'.$mini_atte;?></th>
                <th>Name</th>
               </tr>
                </thead>
     <tbody>

  <?php

               $count=0;
                if($result= $dbConnection->query("SELECT * FROM {$subject_code} WHERE section = 'A'")) {
                   while ($row = $result->fetch_object()) {
                       $attendance = $row->attendance + $row->edit;
                       $enroll_no= $row->enroll_no;
                      // echo $row->enroll_no.' -> '.$attendance.'<br />';
                      $dbConnection->query("UPDATE {$subject_code} SET attendance = {$attendance},edit=0 WHERE enroll_no = '{$enroll_no}' AND section = 'A'");
                   }
                }
                $selectStudentsQuery = "SELECT * FROM {$subject_code} WHERE section = 'A' AND attendance < {$mini_atte}";
                $resultSet =$dbConnection->query($selectStudentsQuery);
               //loop
                while($row = $resultSet->fetch_object()){

                  $toNotifyStudent[$count]=$row->enroll_no;$count+=1;
                ?>
                        <tr>
                        <td scope='row'>
                          <b class='red-text'> <?php echo $count;?></b>
                         </td>
                        <!-- enroll np-->
                        <td >
                      <b> <?php echo $row->enroll_no;?></b>
                        </td>

                        <td class="blue-text">

                        <b> <?php
                               $attendance = $row->attendance+$row->edit;
                         echo $attendance;?> </b>
                        </td>

                        <td> <?php
                        $getNameResultSet = $dbConnection->query("SELECT username FROM valid_users_list WHERE enroll_no = '{$row->enroll_no}'");
                        if($getNameRow = $getNameResultSet->fetch_object()){
                                echo $getNameRow->username;
                        }

                        ?>   </td>
                        </tr>

        <?php
              }


       $_SESSION['Section']="A";
       $_SESSION['toNotifyStudent']=$toNotifyStudent;
  ?>
 </tbody>
   </div>
  </table>
  <?php 
 If($mini_atte){   ?>
 <input type="button" onclick="sendNotification()" value="Notify" class="btn btn-info" />

<?php
}
/*$arrlength = count($toNotifyStudent);
for($x = 0; $x < $arrlength; $x++) {
    echo $toNotifyStudent[$x];
    echo "<br>";
}*/

?>
</form>
 </div>
