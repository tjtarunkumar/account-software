<?php
include_once "globals.php";
include_once "session.php";

if($logged_in) 	 
{	
	$loginmenu=afterlogin("change_password");
	$wel="Welcome Mr.<strong><font color=green> ".ucwords($username)."</font></strong>";
	if($caller=="self")
	{
		$errors=array();
		if(empty($pass))    $errors['pass']="<font color=red>Empty</font>";
		if(empty($pass_confirm))    $errors['pass_confirm']="<font color=red>Empty</font>";
		
		if(empty($errors))
		{
			if($pass==$pass_confirm)
			{
				$q="update user set password=Password('$pass_confirm') where username='$username'";
				$qr=mysqli_query($conn,$q) or die($qr.mysqli_error($conn));
				$s="<font color=green>Password Updated Successfully</font>";
			}
			else
			{
				$s="<font color=red>Password and Password Confirm Not Match</font>";
			}
		}
	}
$content="
<div class='w3-container w3-blue'>
     <h2>Change Password Form</h2>
</div>
	$s
<form class='w3-container'>
	 <p>
	     <label> Enter New Password</label>
	     <input type='password' name='pass' class='w3-input' value='$pass'>$errors[pass]
	 </p>
	 <p>
	     <label>Retype Password</label>
		 <input type='password' name='pass_confirm'  class='w3-input' value='$pass_confirm'>$errors[pass_confirm]
	</p>
		 <input type='hidden' name='caller' value='self'>
	     <button class='w3-input w3-blue' type='submit'>Change</button>
</form>";
}
else
{
	$content="Please <a href='index.php'>Login</a>";
}
$buff=file_get_contents('template.html');
eval($buff);
echo $page;
?>
