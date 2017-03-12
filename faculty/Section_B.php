<?php 
   error_reporting(0);
  require '../db/connection.php';
  session_start();
 
  $subject_code = $_SESSION['subject_code'];
  $subject_name = $_SESSION['subject_name'];
  $defChekbox= $_GET['value'];
  $date = date('Y-m-d');
  ?>
  
                <h3 class='h3-responsive'><?php 
                        // print the no. of classes taken
                        $enroll_no =  $_SESSION['enroll_no'];
                        $updateClassHappens ="SELECT * FROM subject_table WHERE tought_by = '{$enroll_no}' AND 
                        subject_code = '{$subject_code}'";
                        if($getResultSet = $dbConnection->query($updateClassHappens)){
                        $getRow = $getResultSet->fetch_object();
                        $classesTaken = $getRow->class_happens_in_b;
                    
                 echo "<h4 class='blue-text'><b>".$_SESSION['for_sectionB']."</b><hr />".$_SESSION['subject_name'].
                 "<small class='text-muted'> <b> (Class's Taken : ".
                                $classesTaken.")</b> Last class was taken on <b>".$getRow->b_date.
                                "</b></small><hr /></h4>";
                                $b_date=$getRow->b_date;
                                $editFlag=$getRow->edit_flag_for_B;
                                 }

                  // this is to check to enable or disable the edit button
                 if($b_date!=$date)
                   {
                     ?></h3>

                        <!-- form for default checkbox -->
                        <div class='checkbox checkbox-primary'>
                        <input   id='checkbox0'  type='checkbox' class='styled' onchange="CheckboForSectionB()" name="defultCheck" <?php echo $defChekbox;?>/>
                        <label class='h5-responsive' for='checkbox0'> Default Checked/Unchecked
                        </label>
                        </div>
                       
                       
                          <div class='my-2 blue-text'>
                          <p style='font-weight:300;font-size:0.75rem'>Note : Landscape View Sugested.</p>
                          </div>
                          <form action="submitAttendance.php" method="get" >
                          <div class='table-responsive' >

                          <table class='table table-sm' >
                          <thead class="thead-inverse">
                          <tr>
                          <th>Roll No.</th>
                          <th>Present</th>
                          <th>Name</th>
                          </tr>
                          </thead>
                          <tbody>

  <?php
    
                $numberOfStudents=0;
                $selectStudentsQuery = "SELECT * FROM {$subject_code} WHERE section = 'B'";
                $resultSet =$dbConnection->query($selectStudentsQuery);
                while($row = $resultSet->fetch_object()){
                $numberOfStudents+=1;

                ?>
                       <?php
                            if($editAttendance=$row->edit){
                              $attendance=$row->attendance+1;
                           }else{
                             $attendance=$row->attendance;
                            } 

                             $getNameResultSet = $dbConnection->query("SELECT username FROM valid_users_list WHERE enroll_no = '{$row->enroll_no}'");
                         if($getNameRow = $getNameResultSet->fetch_object()){
                               $getNameRow->username;
                        }
                         ?>

                        <tr>
                        <!-- enroll np-->
                      <td scope='row'> <a 
                        onclick="studenDetailes('<?php echo $row->enroll_no;?>','<?php echo  $attendance;?>','<?php echo $getNameRow->username;?>')"
                         data-toggle="modal" data-target=".bd-example-modal-sm"> 
                        
                        <?php echo "".$row->enroll_no."";?> </a>
                        </td>
                             
                        <td>
                         <?php
                            if($editAttendance=$row->edit){
                              $attendance=$row->attendance+1;
                           }else{
                             $attendance=$row->attendance;
                            } 
                         ?>

                         <div class='checkbox checkbox-success'>
                        <input type="checkbox" id='checkbox<?php echo $numberOfStudents;?>'  name="<?php echo 'student'.$numberOfStudents; ?>"
                        value="<?php echo $row->enroll_no;?>" <?php echo $defChekbox; ?>/>
                        
                        <label class='h5-responsive' for='checkbox<?php echo $numberOfStudents;?>'> <?php echo $attendance;?>
                      
                        </label>
                        </div>
                        </td>

                        <td> <?php
                        $getNameResultSet = $dbConnection->query("SELECT username FROM valid_users_list WHERE enroll_no = '{$row->enroll_no}'");
                        if($getNameRow = $getNameResultSet->fetch_object()){
                                echo $getNameRow->username;
                        }
                        
                        ?>   </td>
                        </tr>

        <?php
              $numberOfStudents+=1;
              }
      
      $_SESSION['numberOfStudents']=$numberOfStudents;
       $_SESSION['Section']="B"; 

  ?> 
 </tbody> 
   </div>
  </table>
<?php
 
     echo '<input type="submit" onclick="callAlert()"  class="btn btn-unique wave-effect" value="Submit" />';
   } 
  
    if( !$editFlag && $date==$b_date)
      {
         echo "<a class='btn btn-blue-grey wave-effect' onclick='callEditAttendance(`B`)'>Edit Attendance</a>";
      }

      if($date==$b_date)
       echo '<input type="button" onclick="viewAttendance(`B`)"  class="btn btn-mdb wave-effect" value="View Attendance" />';   
?>

</form>
 </div>
 
