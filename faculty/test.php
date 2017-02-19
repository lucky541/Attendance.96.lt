<?php
  session_start();
 $name = "name";
 $_session[$name.'lucky']='lucky';
 echo $_session[$name.'lucky'];

?>