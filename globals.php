<?php
include_once"menu.php";
//include_once"sidebar.php";
//include_once"jquery.js";

$db_host="localhost";
$db_user="root";
$db_pwd="";
$db_name="accounting";

/*------------connect.php---------------*/

$conn=mysqli_connect($db_host, $db_user, $db_pwd,$db_name) or die("Could not connect Database") ;
//mysql_select_db($db_name) or die("Could not select Database");

/*------------------variables.php-----------------------*/
 
 foreach($_REQUEST as $variable => $value)
 {
	 if(is_array($value))
		 $$variable=$value;
	 else
		 $$variable =trim(strip_tags($value));
 }
?>
