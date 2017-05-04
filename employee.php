<?php
include_once "globals.php";
include_once"session.php";

if($logged_in) 	 
{	
	$loginmenu=afterlogin("employee");
	$wel="Welcome Mr.<strong><font color=green> ".ucwords($username)."</font></strong>";
	$q1 = "select * from designation";
	$qr1 = mysqli_query($conn,$q1) or die($q1.mysqli_error($conn));
	while($r1 = mysqli_fetch_object($qr1))
	{
	    $desig_id = $r1 -> id;
		$desig_name = $r1 -> designation_name;
    	if($designation_id == $desig_id) $did.="<option value=$desig_id selected>$desig_name</option>";
    	else $did.="<option value=$desig_id>$desig_name</option>";
	}
	if($caller=="self")
	{
		$erros=array();
		if(empty($member_name))    $errors['member_name']="<font color=red>Empty</font>";
		if(empty($emp_id))    $errors['emp_id']="<font color=red>Empty</font>";
		else
		{
			$q = "select count(*) as total from employee where emp_id='$emp_id'";
			$qr = mysqli_query($conn,$q) or die($qr.mysqli_error($conn));
			$r=mysqli_fetch_object($qr);
			$total=$r->total;
			if($total>0)
			{
				$errors['emp_id'] = "<font color='red'>Duplicate</font>";
			}
		}
		if(empty($working_place))    $errors['working_place']="<font color=red>Empty</font>";
		if(empty($sex))    $errors['sex']="<font color=red>Empty</font>";
		if(empty($pan))    $errors['pan']="<font color=red>Empty</font>";
		if(empty($increment_month))    $errors['increment_month']="<font color=red>Empty</font>";
		if(empty($salary_bank))    $errors['salary_bank']="<font color=red>Empty</font>";
		if(empty($save_acc))    $errors['save_acc']="<font color=red>Empty</font>";
		if(empty($pf_bank))    $errors['pf_bank']="<font color=red>Empty</font>";
		if(empty($pf_acc))    $errors['pf_acc']="<font color=red>Empty</font>";
		if(empty($pf_bal))    $errors['pf_bal']="<font color=red>Empty</font>";
		if(empty($dob))    $errors['dob']="<font color=red>Empty</font>";
		if(empty($mobile))    $errors['mobile']="<font color=red>Empty</font>";
		if(empty($doj))    $errors['doj']="<font color=red>Empty</font>";
		if(empty($el_bal))    $errors['el_bal']="<font color=red>Empty</font>";
		
		if(empty($designation_id))    $errors['designation_id']="<font color=red>Empty</font>";

	if(empty($errors))
	{
		$q="insert into employee(employee_name, designation_id,emp_id,work_place,sex,pan,incre_month,salary_bank,save_acc,pf_acc,pf_bank,pf_bal,dob,doj,el_bal,mobile)
		values('$member_name', '$designation_id','$emp_id','$working_place','$sex','$pan','$increment_month','$salary_bank','$save_acc','$pf_acc','$pf_bank','$pf_bal','$dob','$doj','$el_bal','$mobile')";
		$qr=mysqli_query($conn,$q) or die($q.mysqli_error($conn));
		$id=mysqli_insert_id($conn);
		$success= "<font color=green>Record Saved Successfully</font>";
	}
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
	 <h2>Add Employee</h2>
</div>
$success
<form class='w3-container' method='post'>
	 <p><label>Select Designation<font color=red><span>*</span></font></label>
		 <select name='designation_id' class='w3-input'>
			 <option value=''>Select</option>
			   $did
		 </select>
	 </p>$errors[designation_id]
	
	 <p><label>Employee Name<font color=red><sup>*</sup></font></label>
		 <input class='w3-input' type='text' name='member_name' value='$member_name'>
	 </p>$errors[member_name]
	 
	 <p><label>Date of Birth<font color=red><sup>*</sup></font></label>
		 <input class='w3-input' type = 'text' id = 'datepicker-13' name='dob'>
	 </p>$errors[dob]

	 <p><label>Date of Joining<font color=red><sup>*</sup></font></label>
		 <input class='w3-input' type = 'text' id = 'datepicker-11' name='doj'>
	 </p>$errors[doj]
	 
	 <p><label>Employee ID<font color=red><sup>*</sup></font></label>
		 <input class='w3-input' type='text' name='emp_id' value='$emp_id'>
	 </p>$errors[emp_id]

	 <p><label>Working Place<font color=red><sup>*</sup></font></label>
		 <input class='w3-input' type='text' name='working_place' value='$working_place'>
	 </p>$errors[working_place]

	 <p><label>Sex<font color=red><sup>*</sup></font></label>
		 <select name='sex' class='w3-input'>
		 <option value=''>Select</option>
		 <option value='male'>Male</option>
		 <option value='female'>Female</option>
		 </select>
	 </p>$errors[sex]

	 <p><label>Mobile Number<font color=red><sup>*</sup></font></label>
		 <input class='w3-input' type='text' name='mobile' value='$mobile'>
	 </p>$errors[mobile]

	 <p><label>PAN Number<font color=red><sup>*</sup></font></label>
		 <input class='w3-input' type='text' name='pan' value='$pan'>
	 </p>$errors[pan]

	 <p><label>Increment Month<font color=red><sup>*</sup></font></label>
		 <input class='w3-input' type='text' name='increment_month' value='$increment_month'>
	 </p>$errors[increment_month]

	 <p><label>Salary Bank<font color=red><sup>*</sup></font></label>
		 <input class='w3-input' type='text' name='salary_bank' value='$salary_bank'>
	 </p>$errors[salary_bank]

	 <p><label>Saving Account<font color=red><sup>*</sup></font></label>
		 <input class='w3-input' type='text' name='save_acc' value='$save_acc'>
	 </p>$errors[save_acc]

	 <p><label>PF Bank<font color=red><sup>*</sup></font></label>
		 <input class='w3-input' type='text' name='pf_bank' value='$pf_bank'>
	 </p>$errors[pf_bank]

	 <p><label>PF Account<font color=red><sup>*</sup></font></label>
		 <input class='w3-input' type='text' name='pf_acc' value='$pf_acc'>
	 </p>$errors[pf_acc]

	 <p><label>PF Balance</label>
		 <input class='w3-input' type='text' name='pf_bal' value='$pf_bal'>
	 </p>$errors[pf_bal]

	 <p><label>El Balance</label>
		 <input class='w3-input' type='text' name='el_bal' value='$el_bal'>
	 </p>$errors[el_bal]
	  
	 <input type='hidden' name='caller' value='self'>
	 <button class='w3-input w3-blue' type='submit'>Save</button> 
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
