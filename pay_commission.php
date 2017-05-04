<?php
include_once "globals.php";
include_once "session.php";

if($logged_in) 	 
{	
	$loginmenu=afterlogin("pay_commission");
	$wel="Welcome Mr.<strong><font color=green> ".ucwords($username)."</font></strong>";
	if($caller=="self")
	{
		$erros=array();
		if(empty($commission_name))    $errors['commission_name']="<font color=red>Empty</font>";
		else
		{
			$q = "select count(*) as total from pay_commission where commission_name='$commission_name'";
			$qr = mysqli_query($conn,$q) or die($qr.mysqli_error($conn));
			$r=mysqli_fetch_object($qr);
			$total=$r->total;
			if($total>0)
			{
				$errors['commission_name'] = "<font color='red'>Duplicate</font>";
			}
		} 
		if(empty($errors))
		{
			$q="insert into pay_commission (commission_name)  values('$commission_name')";
			$qr=mysqli_query($conn,$q) or die($q.mysqli_error($conn));
			$id=mysqli_insert_id($conn);
			$success= "<font color=green>Record Saved Successfully</font>";
		}
	}
$content="
<div class='w3-container w3-blue'>
     <h2>Add Pay Commission</h2>
</div>
$success
<form class='w3-container'>
     <p>
         <label>Enter Commission Name</label>
         <input class='w3-input' type='text' name='commission_name' value='$commission_name'></p>$errors[commission_name]
     </p>
	 <input type='hidden' name='caller' value='self'>
     <button class='w3-input w3-blue' type='submit'>Save </button> 
</form>";
}
else
{
	$content="Please <a href='index.php'>Login</a>";
}
$buf=file_get_contents("template.html");
eval($buf);
echo $page;
?>
