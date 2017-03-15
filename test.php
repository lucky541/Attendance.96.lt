
<?php
//error_reporting(0);
 include 'db/connection.php';

/* create a prepared statement */
if($stmt = $dbConnection->prepare("SELECT username,enroll_no,department,role,studing_year,section,semester FROM valid_users_list WHERE enroll_no =?
                     AND password = ?")){
                       $input_username='flt1'; $input_password="faculty1";
$stmt->bind_param('ss',$input_username,$input_password);
$stmt->execute();
$stmt->bind_result($username,$enroll_no,$department,$role,$studing_year,$section,$semester);
$stmt->fetch();
  echo "username: ".$username.'<br />';
    echo "username: ".$enroll_no.'<br />';
      echo "username: ".$department.'<br />';
        echo "username: ".$role.'<br />';
          echo "username: ".$studing_year.'<br />';
          echo "username: ".$section.'<br />';
          echo "username: ".$semester.'<br />';


                     }
if ($stmt = $dbConnection->prepare("SELECT password FROM valid_users_list WHERE enroll_no=?")) {

$admin='flt1';
    /* bind parameters for markers */
    $stmt->bind_param("s",$admin);

    /* execute query */
    $stmt->execute();
     $stmt->bind_result($enroll_no);
    while ($stmt->fetch()) {
        // Because $name and $countryCode are passed by reference, their value
        // changes on every iteration to reflect the current row
        echo "<pre>";
        echo "name: $enroll_no\n";
      }
    /* close statement */
    $stmt->close();
}else{
	echo "string";
}


?>
