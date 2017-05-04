<?php
include_once"globals.php";
include_once"session.php";

$id=$_REQUEST['id'];

if($logged_in) 	 
{
	$loginmenu=afterlogin("employee");
	$wel="Welcome Mr.<strong><font color=green> ".ucwords($username)."</font></strong>";
	$ascdesc = "";
	$ascdesc = isset($_GET['ascdesc'])?$_GET['ascdesc']:'DESC';
	switch(strtoupper($ascdesc))
	{
	  case 'DESC': $ascdesc = 'ASC'; break;
	  case 'ASC': $ascdesc = 'DESC'; break;
	  default: $ascdesc = 'DESC'; break;
	}
	
	if(empty($page_size)) $page_size=10;
	if(empty($current_page)) $current_page=1;
	$q="select count(*) as total from employee";
	$qr=mysqli_query($conn,$q) or die($qi.mysql_error($conn));
	$r=mysqli_fetch_object($qr);
	$total_records=$r->total;
	if($total_records%$page_size==0)
	$total_pages=$total_records/$page_size;
	else
	$total_pages=ceil($total_records/$page_size);
	$index=($current_page-1)*$page_size;
	if($current_page > 1) $i=($current_page-1)*($page_size)+1;
	else $i=1;

	$q="select * from employee  order by employee_name $ascdesc limit $index,$page_size";
	$qr=mysqli_query($conn,$q) or die($q.mysql_error($conn));
	while($r=mysqli_fetch_object($qr))
	{
		$id=$r->id;
		$did=$r->designation_id;
		$name=$r->employee_name;
		$mobile=$r->mobile;
		$work=$r->work_place;
			
		$q1 = "select * from designation where id='$did'";
		$qr1 = mysqli_query($conn,$q1) or die($q1.mysqli_error($conn));
		while($r1 = mysqli_fetch_object($qr1))
		{
			$dname=$r1->designation_name;
		}
		$sub.="<tr><td>$i</td><td><a href='employee_details.php?id=$id'>$name</a></td><td>$dname</td><td>$work</td><td>$mobile</td>
		<td><a href='employee_edit.php?id=$id'><i class='fa fa-pencil'></i></a></td><td><a href='employee_delete.php?id=$id'><i class='fa fa-trash'></i></a></td><tr>";
		$i++;
	}
		
	for($i=1; $i<=$total_pages; $i++)
	{
		if($i==$current_page)
		$p.= "<option value='$i' selected>$i</option>";
		else
		$p.= "<option value='$i'>$i</option>;";
	}

$content="
<div class='w3-container w3-blue'>
     <h2 class='w3-left'>Employee List</h2>
     <a href='employee.php' style='margin-top:10px;' title='Add Employee' class='w3-right w3-button w3-circle w3-red'>Add</a>
</div>
<table class='w3-table-all w3-hoverable'>
	 <tr>
		 <th>SL NO.</th>
		 <th><a href='employee_list.php?ascdesc=$ascdesc'>Member Name</a></th>
		 <th>Designation</th>
		 <th>Work Place</th>
		 <th>Mobile Number</th>
		 <th>Edit</th>
		 <th>Delete</th>
	 </tr>
      $sub
</table>
<form action='employee_list.php'>
	 Page No<select name='current_page' onchange='this.form.submit();'>
		        $p
	        </select>
	 <input type='hidden' name='page_size' value='10'>
	 <input type='hidden' name='ascdesc' value='ascdesc'>
</form>";
}
else
{
	$content="Please <a href='admin_login.php'>Login</a>";
}
$buff=file_get_contents('template.html');
eval($buff);
echo $page;
?>
