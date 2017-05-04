<?php
include_once "globals.php";
include_once"session.php";

$id=$_REQUEST['id'];
if($logged_in) 	 
{	
	$loginmenu=afterlogin("pay_scale");
	$wel="Welcome Mr.<strong><font color=green> ".ucwords($username)."</font></strong>";

	if($caller=="self")
	{
		$errors=array();
		if(empty($pay_com_id))      $errors['pay_com_id']="<font color=red>Empty</font>";
		if(empty($min))      $errors['minimum']="<font color=red>Empty</font>";
		if(empty($max))      $errors['maximum']="<font color=red>Empty</font>";
		if(empty($grade))    $errors['grade_pay']="<font color=red>Empty</font>";
		if(empty($pay))     $errors['pay_name']="<font color=red>Empty</font>";
		if(empty($entry))    $errors['entry_pay']="<font color=red>Empty</font>";
		
		if(empty($errors))
		{
			$q="update pay_scale set pay_commission_id='$pay_com_id', minimum='$min', grade_pay='$grade', maximum='$max',pay_name='$pay', entry_pay='$entry' 
			where id='$id'";
			$qr=mysqli_query($conn,$q) or die($q.mysqli_error($conn));
			$success= "<font color=green>Record Edited Successfully</font>";
		}
	}else{
	  		$q ="select * from pay_scale where id='$id'";
	  		$qr = mysqli_query($conn,$q) or die($q.mysqli_error($conn));
	  		while($r = mysqli_fetch_object($qr))
	  		{
		 		$pay_com_id=$r->pay_commission_id;
		 		$min=$r->minimum;
		 		$max=$r->maximum;
		 		$grade=$r->grade_pay;
		 		$pay=$r->pay_name;
		 		$entry=$r->entry_pay;
	  		}
    }

	$q2 = "select * from pay_commission";
	$qr2 = mysqli_query($conn,$q2) or die($q2.mysqli_error($conn));
	while($r = mysqli_fetch_object($qr2))
	{
	    $pay_cid = $r->id;
		$com_name = $r->commission_name;
    	if($pay_com_id == $pay_cid)
			$pcid.="<option value='$pay_cid' selected>$com_name</option>";
    	else
        	$pcid.="<option value='$pay_cid'>$com_name</option>";
	}


$content="<div class='w3-container w3-blue'>
  <h2>Edit Pay Scale</h2>
</div>
$success
<form class='w3-container'>
<p><label>Select Pay Commission</label>
<select name='pay_com_id' class='w3-input'>
     <option value=''>Select</option>
	 $pcid
</select></p>$errors[pay_commission_id]
  <p><label>Minimum</label>
  <input class='w3-input' type='text' name='min' value='$min'></p>$errors[min]
  <p><label>Grade Pay</label>
  <input class='w3-input' type='text' name='grade' value='$grade'></p>$errors[grade]
  <p><label>Maximum</label>
  <input class='w3-input' type='text' name='max' value='$max'></p>$errors[max]
  <p><label>Name of Pay</label>
  <input class='w3-input' type='text' name='pay' value='$pay'></p>$errors[pay]
  <p><label>Entry Pay Band</label>
  <input class='w3-input' type='text' name='entry' value='$entry'></p>$errors[entry]
  <input type='hidden' name='caller' value='self'>
  <input type=hidden name='id' value='$id'>
  <button class='w3-input w3-blue' type='submit'>Update </button> 
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
