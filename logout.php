<?php
include_once "globals.php";
include_once "session.php";
$m=beforemenu();

if($logged_in)   
{   
	session_destroy();
    unset($_SESSION['username']);
	unset($_SESSION['password']);
	
	$log.="<h4>You have Successfully Logged out.<br><a href=index.php>  Login Again</a></h4>";
$content="<div class='logout'>
<table align=center border=1>
<br><br><br><tr><th class=content>
$log
</th></tr></table></div>";
}
	
else    {    header("Location:index.php");  }
$buff=file_get_contents('template.html');
eval($buff);
echo $page;
?>