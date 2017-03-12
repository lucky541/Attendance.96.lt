<?php 
  error_reporting(0);
  require '../db/connection.php';
  session_start();

  
  $enroll_no= $_SESSION['enroll_no'];
  $dept =  $_SESSION['department'];  

    $selectClassQuery = "SELECT * FROM subject_table WHERE tought_by = '{$enroll_no}'"; 
    
     if($resultSet = $dbConnection->query($selectClassQuery)){
        if($row = $resultSet->num_rows){
          
            $row = $resultSet->fetch_object();

               $classYear = $row->for_year;
                $classDept = $row->for_department;
                $_SESSION['subject_code']= $row->subject_code;
                $_SESSION['subject_name']=$row->subject_name;
                 $_SESSION['classYear']=$row->for_year;
                $_SESSION['classDept']=$row->for_department;   
                      $class=$_SESSION['for_sectionA']=$classYear.'_'.$classDept.'_A';

                      ?> 

                      <a  class='btn btn-primary waves-effect' 
                          onClick ="loadTableForSectionA('A')">

                       <?php echo $classYear.'_'.$classDept.'_A'."</a>";
                          $_SESSION['for_sectionA']=$classYear.'_'.$classDept.'_A';
                    
                         $class=$_SESSION['for_sectionB']=$classYear.'_'.$classDept.'_B';
                      ?>
  
                     
                      <a  class='btn btn-info waves-effect' 
                          onClick ="loadTableForSectionB('B')">

                                         <?php echo $classYear.'_'.$classDept.'_B'."</a>";
                                          
                                           
                                        
       }
     }
  
  ?>
   