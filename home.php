<?php
include_once"globals.php";
include_once"session.php";
session_start();

if($logged_in) 	 
	{	
	 //$m=beforemenu();
	 $loginmenu=afterlogin();

	 $wel="Welcome Mr.<strong><font color=green>$username</font></strong>";
    }
else  
	{
     unset($_SESSION['username']);
	 unset($_SESSION['password']);
	 session_destroy(); 
	 $msg="<strong>Something Wrong. Please<a href=login.php>Try Again</a></strong>";			 
	}    
$content="
<div class='acontent'>
<table align=center class='row'>
<tr class='col-xs-12'><td class='col-xs-1'>$msg</td></tr>
<tr class='col-xs-12'><td class='col-xs-1'>$wel</td></tr>
</table></div>";
$buff=file_get_contents('template.html');
eval($buff);
echo $page;
?>