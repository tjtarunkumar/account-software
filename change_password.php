<?php
include_once "globals.php";
include_once "session.php";


$loginmenu=afterlogin();
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
$content="<section id='blog' class='container'><div class='cp'>
<div class='row'>
	 <div class=col-sm-4></div>
		 <div class=col-sm-4><h4>     Welcome to Change Password</h4>
			 <form class='center' role='form'>
				 <fieldset class='password-form'>
					 <div class='form-group'>
						 <input type='password' name='pass' placeholder='New Password' class='form-control' value=$pass>$errors[pass]
					 </div>
					 <div class='form-group'>
						 <input type='password' name='pass_confirm' placeholder='Password (Confirm)' class='form-control' value=$pass_confirm>$errors[pass_confirm]
					 </div>
					 <div class='form-group'>
						 <input type=hidden name=caller value=self>
						 <button class='btn btn-success btn-md btn-block' type=submit>Change</button>
					 </div>$s
				 </fieldset>
			 </form>
		 </div>
	 <div class=col-sm-4></div>
</div></div>
</section>";
	

$buff=file_get_contents('template.html');
eval($buff);
echo $page;
?>