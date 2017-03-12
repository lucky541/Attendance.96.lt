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
          
    echo "Section---".$section;
            // to select the correct section
           if(!strcmp($section,'A')){
             $editFlag=$getRow->edit_flag_for_A;
              $flagForAttendance='edit_flag_for_A';
           }
           else{
             $editFlag=$getRow->edit_flag_for_B;
              $flagForAttendance='edit_flag_for_B';
           }
         //   echo 'date '.$date.' fetched '.$fetched_date;
              echo "editFlag--->".$editFlag;
    // to check on what date attendance is mark
    // if the date varies then only increment the classes taken
    if( !$editFlag && $date!=$fetched_date)
      {    
           //erase the privious attendance on edit flield
           $dbConnection->query("UPDATE {$subject_name} SET edit = 0 WHERE section= '{$section}' ");

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
                            
                            $attendance = $row->attendance; 
                            $attendance+=1;
                          
                            $updateQuery = "UPDATE {$subject_name} SET attendance = {$attendance} WHERE enroll_no = '{$enroll_no}'";
                                $dbConnection->query($updateQuery);
                             
                     }
              $num+=1;
            }        
                     // subjec name is the subject code
                    //set editAttendanceFlag of subject_table to zero 
                             $updateQuery = "UPDATE subject_table SET {$flagForAttendance} = 1 WHERE subject_code = '{$subject_name}'";
                            $dbConnection->query($updateQuery);
        }                      

     }
 header('Location: TakeAttendance.php');
?>