<?php
include_once"globals.php";
include_once"session.php";


if($logged_in) 	 
{
$loginmenu=afterlogin();
if($caller=="self")
{
	if($choice=='y')
	 {
		$q="delete  from pay_commission where id='$id'";
		$qr=mysqli_query($conn,$q) or die($q.mysqli_error($conn));
		$sucess= "Record Deleted";
	 }
	if(empty($choice) or $choice=='n')
	 {
		$sucess="Record not Deleted";
	 }
}
$content="<div class='delete'>
<table align=center><tr><th>
	 <form>
	     <h3>Do you want to delete the Commission Id No: $id</h3>
		 <input type=radio name=choice value=y if($choice=='y') echo checked><font color=orange>Yes</font>
		 <input type=radio name=choice value=n if($choice=='n') echo checked><font color=orange>No</font>
		 <input type=hidden name=id value=$id>
		 <input type=hidden name=caller value=self>
		 <button type='submit' class='btn'>Delete</button>
	 </form><br><h2>$sucess</h2><br>
</th></tr></table></div>";
}	
else
{
		$content="Please <a href='index.php'>Login</a>";
}
$buff=file_get_contents('template.html');
eval($buff);
echo $page;
?>