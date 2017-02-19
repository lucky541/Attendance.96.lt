<?php
 error_reporting(0);
  require '../db/connection.php';
  session_start();
$subject_name = $_SESSION['subject_code'];

  
     
     // upadate the no. of classes happens
      $enroll_no =  $_SESSION['enroll_no'];
      $updateClassHappens ="SELECT * FROM subject_table WHERE tought_by = '{$enroll_no}' AND  subject_code = '{$subject_name}'";
      if($getResultSet = $dbConnection->query($updateClassHappens)){
          $getRow = $getResultSet->fetch_object();
           $section =  $_SESSION['Section'];
          $date = date('Y-m-d');
          

            // to select the correct section
           if(!strcmp($section,'A')){
             $classesTaken = $getRow->class_happens_in_a;
             $sectionName= 'class_happens_in_A';
             $section_date='a_date'; 
             $flagForAttendance='edit_flag_for_A';
              $fetched_date= $getRow->a_date;
           }
           else{
            $classesTaken = $getRow->class_happens_in_b;
            $sectionName= 'class_happens_in_B';
            $section_date='b_date'; 
             $flagForAttendance='edit_flag_for_B';
             $fetched_date= $getRow->b_date;
           }
         //   echo 'date '.$date.' fetched '.$fetched_date;
             
    // to check on what date attendance is mark
    // if the date varies then only increment the classes taken
    if( $date!=$fetched_date)
      {
          $classesTaken+=1;
          $upadeClassHappen = "UPDATE subject_table SET {$sectionName} = {$classesTaken}, {$section_date} = '{$date}' WHERE   tought_by = '{$enroll_no}' AND subject_code ='{$subject_name}'";  
          $dbConnection->query($upadeClassHappen);     


               // update the students attendance 
            $numberOfStudents = $_SESSION['numberOfStudents'];
            $num =0;
            while($num <= $numberOfStudents)
             {

                if(isset($_GET['student'.$num]))
                      {
                            $enroll_no = $_GET['student'.$num];

                            $selectStudentsQuery = "SELECT * FROM {$subject_name} WHERE enroll_no = '{$enroll_no}'" ;
                            $resultSet =$dbConnection->query($selectStudentsQuery);
                            $row = $resultSet->fetch_object();

                            /*if edit is not zero then add the edit to attendance and then mark the current attendance in the edit filed for providing the edit attendance functionalities */
                            $attendance = $row->attendance; $editAttendance = $row->edit;
                            if($editAttendance)
                              {
                                $attendance =  $attendance+$editAttendance;
                                $updateQuery = "UPDATE {$subject_name} SET attendance = {$attendance},edit=0 WHERE enroll_no = '{$enroll_no}'";
                                $dbConnection->query($updateQuery);
                              }

                            $updateQuery = "UPDATE {$subject_name} SET edit = 1 WHERE enroll_no = '{$enroll_no}'";
                            $dbConnection->query($updateQuery);
                           
                         
                     }
              $num+=1;
            }        
                     // subjec name is the subject code
                    //set editAttendanceFlag of subject_table to zero 
                       //$section='class_happens_in_'.$sectionName;
                             $updateQuery = "UPDATE subject_table SET {$flagForAttendance} = 0 WHERE subject_code = '{$subject_name}'";
                            $dbConnection->query($updateQuery);
        }                      

     }
        
 header('Location: TakeAttendance.php');
?>