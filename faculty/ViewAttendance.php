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
           
            <div class='table-responsive' >
            <table class='table table-sm' >
            <thead class="thead-inverse">
            <tr>
            <th>Roll No.</th>
            <th>Attendance</th>
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
                        <td scope='row ' class="lead"> <a onclick="showme('<?php echo $row->enroll_no;?>')" data-toggle="modal" data-target=".bd-example-modal-sm"> 
                        <?php echo "".$row->enroll_no."";?> </a>
                        </td>
                             
                        <td>
                         
                            <?php 
                            //this will fetch the value of edit if set mark chekbox as checked as unchecked
                            if($editAttendance=$row->edit){
                            $attendance=$row->attendance+1;
                            }else{
                            $attendance=$row->attendance;
                            } 
                           ?>
                           <div class="lead blue-text"> 
                           <?php
                              echo '&nbsp; &nbsp; &nbsp; &nbsp;'.$attendance;
                            ?>
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
  </table>

 <?php
     }
 ?>