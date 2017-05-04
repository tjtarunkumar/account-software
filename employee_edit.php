<?php
include_once "globals.php";
include_once"session.php";

$id=$_REQUEST['id'];
if($logged_in) 	 
{	
	$loginmenu=afterlogin("employee");
	$wel="Welcome Mr.<strong><font color=green> ".ucwords($username)."</font></strong>";
	
	if($caller=="self")
	{
		$erros=array();
		if(empty($member_name))    $errors['member_name']="<font color=red>Empty</font>";
		if(empty($designation_id))    $errors['designation_id']="<font color=red>Empty</font>";
		if(empty($work))    $errors['work']="<font color=red>Empty</font>";
		if(empty($sex))    $errors['sex']="<font color=red>Empty</font>";
		if(empty($pan))    $errors['pan']="<font color=red>Empty</font>";
		if(empty($incre_month))    $errors['incre_month']="<font color=red>Empty</font>";
		if(empty($salary_bank))    $errors['salary_bank']="<font color=red>Empty</font>";
		if(empty($save_acc))    $errors['save_acc']="<font color=red>Empty</font>";
		if(empty($pf_bank))    $errors['pf_bank']="<font color=red>Empty</font>";
		if(empty($pf_acc))    $errors['pf_acc']="<font color=red>Empty</font>";
		if(empty($pf_bal))    $errors['pf_bal']="<font color=red>Empty</font>";
		if(empty($dob))    $errors['dob']="<font color=red>Empty</font>";
		if(empty($mobile))    $errors['mobile']="<font color=red>Empty</font>";
		if(empty($doj))    $errors['doj']="<font color=red>Empty</font>";
		if(empty($el_bal))    $errors['el_bal']="<font color=red>Empty</font>";
		if(empty($errors))
		{
			$q="update employee set employee_name='$member_name', designation_id='$designation_id',emp_id='$emp_id',work_place='$work',sex='$sex',pan='$pan',incre_month='$incre_month',salary_bank='$salary_bank',save_acc='$save_acc',pf_acc='$pf_acc',pf_bank='$pf_bank',pf_bal='$pf_bal',dob='$dob',doj='$doj',el_bal='$el_bal',mobile='$mobile' where id='$id'";
			$qr=mysqli_query($conn,$q) or die($q.mysqli_error($conn));
			$id=mysqli_insert_id($conn);
			$success= "<font color=green>Record Edited Successfully</font>";
		}
	}
	else
	{
		$q2 = "select * from employee where id='$id'";
		$qr2 = mysqli_query($conn,$q2) or die($q2.mysqli_error($conn));
		while($r2 = mysqli_fetch_object($qr2))
		{
			$eid = $r2->id;
			$member_name = $r2->employee_name;
           	$designation_id = $r2->designation_id;
			$emp_id = $r2 -> emp_id;
			$work = $r2 -> work_place;
			$sex = $r2 -> sex;
			$pan = $r2 -> pan;
			$incre_month = $r2 -> incre_month;
			$salary_bank = $r2 -> salary_bank;
			$save_acc = $r2 -> save_acc;
			$pf_bank = $r2 -> pf_bank;
			$pf_acc = $r2 -> pf_acc;
			$dob = $r2 -> dob;
			$doj = $r2 -> doj;
			$pf_bal = $r2 -> pf_bal;
			$el_bal = $r2 -> el_bal;
			$mobile = $r2 -> mobile;
			
			if($sex == $sex)
			{
				$gender.="<option value='$sex' selected>$sex</option>";
				if($sex=='male')
				{
					$gender.="<option value='female'>female</option>";
				}	
				if($sex=='female')
				{
					$gender.="<option value='male'>male</option>";
				}				
			}
			
		}
    }

	$q1 = "select * from designation";
	$qr1 = mysqli_query($conn,$q1) or die($q1.mysqli_error($conn));
	while($r1 = mysqli_fetch_object($qr1))
	{
	    $desig_id = $r1 -> id;
		$desig_name = $r1 -> designation_name;
    	if($desig_id == $designation_id) $did.="<option value='$desig_id' selected>$desig_name</option>";
		else $did.="<option value='$desig_id'>$desig_name</option>";
	}
	
$content="
<script>
         $(function() {
            $( '#datepicker-13' ).datepicker();
            $( '#datepicker-13' ).datepicker('show');
         });
		 $(function() {
            $( '#datepicker-11' ).datepicker();
            $( '#datepicker-11' ).datepicker('show');
         });
</script>
<div class='w3-container w3-blue'>
     <h2>Edit Employee</h2>
</div>
$success
<form class='w3-container' method=post>
	 <p><label>Select Designation</label>
		 <select name='designation_id' class='w3-input'>
			 <option value=''>Select</option>
				$did
		 </select>
	 </p>$errors[designation_id]
	 <p><label>Member Name</label>
		 <input class='w3-input' type='text' name='member_name' value='$member_name'>
	 </p>$errors[member_name]
	 
	 	 <p><label>Date of Birth</label>
		 <input class='w3-input' type='text' name='dob' id = 'datepicker-13' value='$dob'>
	 </p>$errors[dob]
	 
	 <p><label>Date of Joining</label>
		 <input class='w3-input' type='text' name='doj' id = 'datepicker-11' value='$doj'>
	 </p>$errors[doj]
	 
	 <p><label>Employee ID</label>
		 <input class='w3-input' type='text' name='emp_id' value='$emp_id'>
	 </p>$errors[emp_id]
	 
	 <p><label>working Place</label>
		 <input class='w3-input' type='text' name='work' value='$work'>
	 </p>$errors[work]
	 
	 <p><label>Gender</label>
		 <select name='sex' class='w3-input'>
			 <option value=''>Select</option>
				$gender
		 </select>
	 </p>$errors[sex]
	 
	 <p><label>PAN</label>
		 <input class='w3-input' type='text' name='pan' value='$pan'>
	 </p>$errors[pan]
	 
	 <p><label>Increment Month</label>
		 <input class='w3-input' type='text' name='incre_month' value='$incre_month'>
	 </p>$errors[incre_month]
	 
	 <p><label>Salary Bank</label>
		 <input class='w3-input' type='text' name='salary_bank' value='$salary_bank'>
	 </p>$errors[salary_bank]
	 
	 <p><label>Saving Account</label>
		 <input class='w3-input' type='text' name='save_acc' value='$save_acc'>
	 </p>$errors[save_acc]
	 
	 <p><label>PF Bank</label>
		 <input class='w3-input' type='text' name='pf_bank' value='$pf_bank'>
	 </p>$errors[pf_bank]
	 
	 <p><label>PF Account</label>
		 <input class='w3-input' type='text' name='pf_acc' value='$pf_acc'>
	 </p>$errors[pf_acc]
	 

	 
	 <p><label>PF Balance</label>
		 <input class='w3-input' type='text' name='pf_bal' value='$pf_bal'>
	 </p>$errors[pf_bal]
	 
	 <p><label>EL Balance</label>
		 <input class='w3-input' type='text' name='el_bal' value='$el_bal'>
	 </p>$errors[el_bal]
	 
	 <p><label>Mobile Number</label>
		 <input class='w3-input' type='text' name='mobile' value='$mobile'>
	 </p>$errors[mobile]
	 
	 <input type='hidden' name='caller' value='self'>
  	 <input type=hidden name=id value=$id>
	 <button class='w3-input w3-blue' type='submit'>Update</button> 
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
