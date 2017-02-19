<?php
 error_reporting(0);
  require '../db/connection.php';
  session_start();
 
  ?>

  <div class='my-2 blue-text'>
                <p style='font-weight:300;font-size:0.75rem'>Note : Landscape View Sugested.</p>
  </div> 
<table class="table table-hover table-sm  text-center">
               <thead class="thead-inverse">
                <tr>
                <th>Enroll_ID</th>
                <th>Name</th>
                <th>Dept.</th>
                <th>Attendance</th>
                <th>Action</th>
                </tr>
                </thead>
                <tbody>

        <?php
           
           $fetchFacultiesQuery="SELECT * FROM valid_users_list WHERE role = 'teacher' ";
          
           if( isset($_GET['dept']) )
                { $dept =  $_GET['dept'];
                   echo '<b> Department : </b> '.$dept.'<br /><br />';
                   $fetchFacultiesQuery="SELECT * FROM valid_users_list WHERE role = 'teacher' AND department = '{$dept}'";
          
                } 
       if($resultSet = $dbConnection->query($fetchFacultiesQuery)){
          if($row = $resultSet->num_rows){
          
                    while($row = $resultSet->fetch_object()){
                         
                         $facultyName = $row->username;
                         $department = $row->department;
                         $facultyID = $row->enroll_no;
                     ?>
                       
                <th scope="row"> <?php echo $facultyID; ?>  </th>
                <td> <?php echo $facultyName; ?>  </td>
                <td> <?php echo $department; ?>  </td>
                
                <td>
                  <?php
                      // fetch faculties attendance
                      $facultyAttendance = "SELECT attendance FROM facultiesattendance WHERE enroll_no = '{$facultyID}'";
                      $resultset = $dbConnection->query($facultyAttendance);
                      $row= $resultset->fetch_object();
                      if(mysqli_num_rows($resultset))
                        echo $row->attendance;

                  ?>
                </td>


                <!-- ACTION BUTTONS -->
                <td class="td-actions text-right">
                <a href="viewFaculty.php?facultyName=<?php echo $facultyID;?>" class="blue-text addMargin" data-toggle="tooltip" data-placement="top" title="View Profile"><i class="fa fa-user"></i></a>
                <a onclick="openNotificationForm('<?php echo $facultyID;?>')" class="teal-text addMargin" btn-lg" data-toggle="modal" data-target="#myModal"><i class="fa fa-envelope"></i></a>
       
                </td>
                </tr>

                     <?php

                    } 
              }
          } 

        ?>

                
                </tbody>
                </table>
                
