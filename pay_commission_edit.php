<?php
include_once"globals.php";
include_once"session.php";
$id=$_REQUEST['id'];


if($logged_in) 	 
{
	$loginmenu=afterlogin("pay_commission");
	$wel="Welcome Mr.<strong><font color=green> ".ucwords($username)."</font></strong>";
	if($caller == "self")
	{
		$erros=array();
		if(empty($name))    $errors['name']="<font color=red>Empty</font>";
		else
		{
			$q = "select count(*) as total from pay_commission where commission_name='$name' and id<>$id";
			$qr = mysqli_query($conn,$q) or die($q.mysqli_error($conn));
			$r=mysqli_fetch_object($qr);
			$total=$r->total;
			if($total>0)
			{
				$errors['name'] = "<font color='red'>Duplicate</font>";
			}
		}
		if(empty($errors))
		{
			$q="update pay_commission set commission_name='$name' where id='$id'";
			$qr=mysqli_query($conn,$q) or die($q.mysqli_error($conn));
			$id=mysqli_insert_id($conn);
			$success= "<font color=green>Record Edited Successfully</font>";
		}
	}
	  $q ="select * from pay_commission where id='$id'";
	  $qr = mysqli_query($conn,$q) or die($q);
	  while($r = mysqli_fetch_object($qr))
	  {
		 $name=$r->commission_name;
	  }
$content="
<div class='w3-container w3-blue'>
     <h2>Edit Pay Commission</h2>
</div>
$success
<form class='w3-container'>
     <p>
         <label>Enter Commission Name</label>
         <input class='w3-input' type='text' name='name' value='$name'></p>$errors[name]
     </p>
	 <input type='hidden' name='caller' value='self'>
     <input type=hidden name='id' value='$id'>
     <button class='w3-input w3-blue' type='submit'>Update </button> 
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
