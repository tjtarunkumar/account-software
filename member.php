<?php
include_once "globals.php";
include_once"session.php";

if($logged_in) 	 
{	
	 //$m=beforemenu();
	$loginmenu=afterlogin();
	$q1 = "select * from designation";
	$qr1 = mysqli_query($conn,$q1) or die($q1.mysqli_error($conn));
	while($r1 = mysqli_fetch_object($qr1))
	{
	    $desig_id = $r1 -> id;
		$desig_name = $r1 -> designation_name;
		$did.="<option value=$desig_id>$desig_name</option>";
	}
if($caller=="self")
{
	$erros=array();
	if(empty($member_name))    $errors['member_name']="<font color=red>Empty</font>";
	if(empty($designation_id))    $errors['designation_id']="<font color=red>Empty</font>";
    else
	{
		$q = "select count(*) as total from member where member_name='$member_name'";
		$qr = mysqli_query($conn,$q) or die($qr.mysqli_error($conn));
		$r=mysqli_fetch_object($qr);
		$total=$r->total;
		if($total>0)
		{
			$errors['member_name'] = "<font color='red'>Duplicate</font>";
		}
	} 
	if(empty($errors))
	{
		$q="insert into member (member_name, designation_id)  values('$member_name', '$designation_id')";
		$qr=mysqli_query($conn,$q) or die($q.mysqli_error($conn));
		$id=mysqli_insert_id($conn);
		$success= "<font color=green>Record Inserted Successfully</font>";
	}
}
$content="<div class='w3-container w3-blue'>
  <h2>Member Enrty Form</h2>
</div>
$success
<form class='w3-container'>
<p><label>Select Designation</label>
<select name='designation_id' class='w3-input'>
     <option value=''>Select</option>
	 $did
</select></p>$errors[designation_id]
  <p>
  <label>Member Name</label>
  <input class='w3-input' type='text' name='member_name' value='$member_name'></p>$errors[member_name]
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