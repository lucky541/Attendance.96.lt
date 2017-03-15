<?php 
error_reporting(0);
 include 'db/connection.php';

/* create a prepared statement */
if ($stmt = $dbConnection->prepare("SELECT * FROM valid_users_list WHERE enroll_no=?")) {

    /* bind parameters for markers */
    $stmt->bind_param("s",'admin');

    /* execute query */
    $stmt->execute();

    /* bind result variables */
   $stmt->bind_result($username);

    /* fetch value */
    echo $stmt->fetch();

    echo $username;


    /* close statement */
    $stmt->close();
}else{
	echo "string";
}


?>