<?php
include_once "globals.php";
include_once"session.php";

if($logged_in) 	 
	{	
	 //$m=beforemenu();
	 $loginmenu=afterlogin();

	$q2 = "select * from pay_commission";
	$qr2 = mysqli_query($conn,$q2) or die($q2.mysqli_error($conn));
	while($r = mysqli_fetch_object($qr2))
	{
	    $pay_com_id = $r -> id;
		$com_name = $r -> commission_name;
		$pcid.="<option value=$pay_com_id>$com_name</option>";
	}	
if($caller=="self")
{
	$loginmenu=afterlogin();
	$errors=array();
	if(empty($pay_commission_id))      $errors['pay_commission_id']="<font color=red>Empty</font>";
	if(empty($minimum))      $errors['minimum']="<font color=red>Empty</font>";
    if(empty($maximum))      $errors['maximum']="<font color=red>Empty</font>";
	if(empty($grade_pay))    $errors['grade_pay']="<font color=red>Empty</font>";
	if(empty($pay_name))     $errors['pay_name']="<font color=red>Empty</font>";
	if(empty($entry_pay))    $errors['entry_pay']="<font color=red>Empty</font>";
	if(empty($errors))
	{
		$q="insert into pay_scale (pay_commission_id, minimum, grade_pay, maximum, pay_name, entry_pay)  
		                    values('$pay_commission_id', '$minimum', '$grade_pay', '$maximum', '$pay_name', '$entry_pay')";
		$qr=mysqli_query($conn,$q) or die($q.mysqli_error($conn));
		//$id=mysqli_insert_id($conn);
		$success= "<font color=green>Record Inserted Successfully</font>";
	}
}
$content="<div class='w3-container w3-blue'>
  <h2>Pay Scale Form</h2>
</div>
$success
<form class='w3-container'>
<p><label>Select Pay Commission</label>
<select name='pay_commission_id' class='w3-input'>
     <option value=''>Select</option>
	 $pcid
</select></p>$errors[pay_commission_id]
  <p><label>Minimum</label>
  <input class='w3-input' type='text' name='minimum' value='$minimum'></p>$errors[minimum]
  <p><label>Grade Pay</label>
  <input class='w3-input' type='text' name='grade_pay' value='$grade_pay'></p>$errors[grade_pay]
  <p><label>Maximum</label>
  <input class='w3-input' type='text' name='maximum' value='$maximum'></p>$errors[maximum]
  <p><label>Name of Pay</label>
  <input class='w3-input' type='text' name='pay_name' value='$pay_name'></p>$errors[pay_name]
  <p><label>Entry Pay Band</label>
  <input class='w3-input' type='text' name='entry_pay' value='$entry_pay'></p>$errors[entry_pay]
  <input type='hidden' name='caller' value='self'>
  <button class='w3-input' type='submit'>Save </button> 
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