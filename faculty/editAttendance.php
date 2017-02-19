<?php 
   error_reporting(0);
  require '../db/connection.php';
  session_start();

  $subject_code = $_SESSION['subject_code'];
  $subject_name = $_SESSION['subject_name'];
  $classYear=$_SESSION['classYear'];
  $classDept=$_SESSION['classDept'];

    if(isset($_GET['section']))
     {
       $_SESSION['Section']=$section=$_GET['section'];
        echo ' <h3 class="h3-responsive">'.$classYear.'_'.$classDept.'_'.$_SESSION['Section'].'</h3>';  
       ?>
      
            <div class='my-2 blue-text'>
            <p style='font-weight:300;font-size:0.75rem'>Note : Landscape View Sugested.</p>
            </div>
            <form action="submitEditedAttendance.php" method="get" >
            <div class='table-responsive' >

            <table class='table table-sm' >
            <thead class="thead-inverse">
            <tr>
            <th>Roll No.</th>
            <th>Present</th>
            <th>First Name</th>
            </tr>
            </thead>
            <tbody>

            <?php
    
              $numberOfStudents=0;
              $selectStudentsQuery = "SELECT * FROM {$subject_code} WHERE section = '$section'";
              $resultSet =$dbConnection->query($selectStudentsQuery);
              
                  while($row = $resultSet->fetch_object())
                  {
                    $numberOfStudents+=1;

             ?>
                        <tr>
                        <!-- enroll np-->
                        <td scope='row'> <a onclick="showme('<?php echo $row->enroll_no;?>')" data-toggle="modal" data-target=".bd-example-modal-sm"> 
                        <?php echo "".$row->enroll_no."";?> </a>
                        </td>
                             
                        <td>
                         <div class='checkbox checkbox-success'>
                            <?php 
                            //this will fetch the value of edit if set mark chekbox as checked as unchecked
                            if($editAttendance=$row->edit){
                            $defChekbox='checked'; $attendance=$row->attendance.'+1';
                            }else{
                            $defChekbox='unchecked'; $attendance=$row->attendance;
                            } ?>

                            <input type="checkbox" id='checkbox<?php echo $numberOfStudents;?>'  name="<?php echo 'student'.$numberOfStudents; ?>"
                            value="<?php echo $row->enroll_no;?>" <?php echo $defChekbox; ?>/>

                            <label class='h5-responsive' for='checkbox<?php echo $numberOfStudents;?>'> <?php echo $attendance;?>

                            </label>
                        </div>
                        </td>

                        <td> 
                        <?php
                            $getNameResultSet = $dbConnection->query("SELECT username FROM valid_users_list WHERE enroll_no = '{$row->enroll_no}'");
                        if($getNameRow = $getNameResultSet->fetch_object()){
                                echo $getNameRow->username;
                            }
                             ?> 
                          </td>
                        </tr>

         <?php
              $numberOfStudents+=1;
              }
      
      $_SESSION['numberOfStudents']=$numberOfStudents;
        
  ?> 
  </tbody> 
   </div>
  </table><input type="submit" onclick="editAttendanceFlag()"  class="btn btn-blue-grey" value="Edit" />;
 
 </form>
 <?php
     }
 ?>