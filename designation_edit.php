<?php
include_once "globals.php";
include_once"session.php";
$id=$_REQUEST['id'];

if($logged_in) 	 
{	
	 //$m=beforemenu();
	$loginmenu=afterlogin();
	/*$q2 = "select * from pay_commission";
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
	}*/
if($caller=="self")
{
	$erros=array();
	if(empty($name))      $errors['name']="<font color=red>Empty</font>";
	else
	{
		$q = "select count(*) as total from designation where designation_name='$name'";
		$qr = mysqli_query($conn,$q) or die($qr.mysqli_error($conn));
		$r=mysqli_fetch_object($qr);
		$total=$r->total;
		if($total>0)
		{
			$errors['name'] = "<font color='red'>Duplicate</font>";
		}
	}
    if(empty($pcid))    $errors['pcid']="<font color=red>Empty</font>";
	if(empty($psid))    $errors['psid']="<font color=red>Empty</font>";
	if(empty($errors))
	{
		$q="update designation set designation_name='$name', pay_commission_id='$pcid', pay_scale_id='$pcid'";
		$qr=mysqli_query($conn,$q) or die($q.mysqli_error($conn));
		$id=mysqli_insert_id($conn);
		$success= "<font color=green>Record Updated Successfully</font>";
	}
}
  $q ="select * from designation where id='$id'";
  $qr = mysqli_query($conn,$q) or die($q);
  while($r = mysqli_fetch_object($qr))
  {
     $name=$r->designation_name;
	 $pay_cid=$r->pay_commission_id;
	 $pay_sid=$r->pay_scale_id;
     $pcid.="<option value='$pay_cid' selected>$pay_cid</option>";
	 $psid.="<option value='$pay_sid' selected>$pay_sid</option>";
  }
$content="<div class='w3-container w3-blue'>
  <h2>Update Designation Form</h2>
</div>
$success
<form class='w3-container'>
<p><label>Select Pay Commission</label>
<select name='pcid' class='w3-input'>
     <option value=''>Select</option>
	  $pcid
</select></p>$errors[pcid]
<p><label>Select Pay Scale</label>
<select name='psid' class='w3-input'>
     <option value=''>Select</option>
	 $psid
</select></p>$errors[psid]
  <p>
  <label>Designation Name</label>
  <input class='w3-input' type='text' name='name' value='$name'></p>$errors[name]
  
  <input type=hidden name='id' value='$id'>
  <input type='hidden' name='caller' value='self'>
  <button class='w3-input' type='submit'>Save</button> 
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