<?php
include_once "globals.php";
include_once"session.php";
$id=$_REQUEST['id'];
if($logged_in) 	 
{	
	$loginmenu=afterlogin("employee");
	$wel="Welcome Mr.<strong><font color=green> ".ucwords($username)."</font></strong>";

	$q="select * from employee where id='$id'";
	$qr=mysqli_query($conn,$q) or die($q.mysql_error($conn));

	while($r=mysqli_fetch_object($qr))
	{
		$id=$r->id;
		$did=$r->designation_id;
		$emp_id=$r->emp_id;
		$sex=$r->sex;
		//$work=$r->work_place;
		$incre_month=$r->incre_month;
		$salary_bank=$r->salary_bank;
		$save_acc=$r->save_acc;
		$pf_acc=$r->pf_acc;
		$pf_bank=$r->pf_bank;
		$pf_bal=$r->pf_bal;
		$dob=$r->dob;
		$doj=$r->doj;
		$el=$r->el_bal;

		$sub.="<tr><td>$emp_id</td><td>$sex</a></td><td>$incre_month</td><td>$salary_bank</td><td>$save_acc</td><td>$pf_acc</td><td>$pf_bank</td><td>$pf_bal</td><td>$dob</td><td>$doj</td><td>$el</td>";
	}
$content="
<div class='w3-container w3-blue'>
     <h2 class='w3-left'>Employee Personal Details</h2>
     
</div>
<table class='w3-table-all w3-hoverable'>
	 <tr>
		 <th>Employee ID</th>
		 <th>Gender</a></th>
		 <th>Increment Month</th>
		 <th>Salary Bank</th>
		 <th>Saving Account</th>
		 <th>PF Account</th>
		 <th>PF Bank</th>
		 <th>PF Balance</th>
		 <th>Date of Birth</th>
		 <th>Date of Joining</th>
		 <th>EL Balance</th>
	 </tr>
      $sub
</table>";
}
else
{
	$content="Please <a href='admin_login.php'>Login</a>";
}
$buff=file_get_contents('template.html');
eval($buff);
echo $page;
?>