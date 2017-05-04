<?php
include_once"globals.php";
include_once"session.php";

$id=$_REQUEST['id'];
if($logged_in) 	 
{
	$loginmenu=afterlogin("pay_commission");
	$wel="Welcome Mr.<strong><font color=green> ".ucwords($username)."</font></strong>";
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
	$q="select commission_name from pay_commission where id='$id'";
	$qr=mysqli_query($conn,$q) or die($q.mysqli_error($conn));
	while($r=mysqli_fetch_object($qr))
	{
		$name=$r->commission_name;
	}
$content="
<div class='w3-container w3-blue'>
	 <h2>Delete Pay Commission</h2>
</div>
<div class='delete'>
	<table align=center><tr><th>
		 <form>
			 <h3>Do you want to delete the Commission : $name</h3>
			 <input type=radio name=choice value=y if($choice=='y') echo checked><font color=orange>Yes</font>
			 <input type=radio name=choice value=n if($choice=='n') echo checked><font color=orange>No</font>
			 <input type=hidden name=id value=$id>
			 <input type=hidden name=caller value=self>
			 <button type='submit' class='w3-blue'>Delete</button>
		 </form><br><h2>$sucess</h2><br>
	</th></tr></table>
</div>";
}	
else
{
		$content="Please <a href='index.php'>Login</a>";
}
$buff=file_get_contents('template.html');
eval($buff);
echo $page;
?>
