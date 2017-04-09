<?php
include_once "globals.php";
$loginmenu=afterlogin();

	$q2 = "select * from pay_commission";
	$qr2 = mysqli_query($conn,$q2) or die($q2.mysqli_error($conn));
	while($r = mysqli_fetch_object($qr2))
	{
	    $pay_com_id = $r -> id;
		$com_name = $r -> commission_name;
		$pcid.="<option value=$pay_com_id>$com_name</option>";
	}
	
	$q1 = "select * from pay_scale";
	$qr1 = mysqli_query($conn,$q1) or die($q1.mysqli_error($conn));
	while($r1 = mysqli_fetch_object($qr1))
	{
	    $pay_sc_id = $r1 -> id;
		$min = $r1 -> minimum;
		$grade = $r1 -> grade_pay;
		$max = $r1 -> maximum;
		$psid.="<option value=$pay_sc_id>$min-$grade-$max</option>";
	}
if($caller=="self")
{
	$erros=array();
	if(empty($designation_name))      $errors['designation_name']="<font color=red>Empty</font>";
	else
	{
		$q = "select count(*) as total from designation where designation_name='$designation_name'";
		$qr = mysqli_query($conn,$q) or die($qr.mysqli_error($conn));
		$r=mysqli_fetch_object($qr);
		$total=$r->total;
		if($total>0)
		{
			$errors['designation_name'] = "<font color='red'>Duplicate</font>";
		}
	}
    if(empty($pay_commission_id))      $errors['pay_commission_id']="<font color=red>Empty</font>";
	if(empty($pay_scale_id))    $errors['pay_scale_id']="<font color=red>Empty</font>";
	if(empty($errors))
	{
		$q="insert into designation (designation_name, pay_commission_id, pay_scale_id)  
		                      values('$designation_name','$pay_commission_id','$pay_scale_id')";
		$qr=mysqli_query($conn,$q) or die($q.mysqli_error($conn));
		$id=mysqli_insert_id($conn);
		$success= "<font color=green>Record Inserted Successfully</font>";
	}
}
$content="<div class='w3-container w3-blue'>
  <h2>Designation Form</h2>
</div>
$success
<form class='w3-container'>
<p><label>Select Pay Commission</label>
<select name='pay_commission_id' class='w3-input'>
     <option value=''>Select</option>
	 $pcid
</select></p>$errors[pay_commission_id]
<p><label>Select Pay Scale</label>
<select name='pay_scale_id' class='w3-input'>
     <option value=''>Select</option>
	 $psid
</select></p>$errors[pay_scale_id]
  <p>
  <label>Designation Name</label>
  <input class='w3-input' type='text' name='designation_name' value='$designation_name'></p>$errors[designation_name]
  <input type='hidden' name='caller' value='self'>
  <button class='w3-input' type='submit'>Save</button> 
</form>";
$buf=file_get_contents("template.html");
eval($buf);
echo $page;
?>