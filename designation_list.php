<?php
include_once"globals.php";
include_once"session.php";

if($logged_in) 	 
{
	$loginmenu=afterlogin("designation");
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
	
	$q="select count(*) as total from designation";
	$qr=mysqli_query($conn,$q) or die($qi.mysql_error($conn));
	$r=mysqli_fetch_object($qr);
	$total_records=$r->total;
	
	if($total_records%$page_size==0) $total_pages=$total_records/$page_size;
	else $total_pages=ceil($total_records/$page_size);
	
	$index=($current_page-1)*$page_size;
	
	if($current_page > 1) $i=($current_page-1)*($page_size)+1;
	else $i=1;
	
	$q = "select * from designation order by designation_name $ascdesc limit $index,$page_size";
	$qr = mysqli_query($conn,$q) or die($q.mysqli_error($conn));
	while($r = mysqli_fetch_object($qr))
	{
		$id=$r->id;
		$name=$r->designation_name;
		$pcid=$r->pay_commission_id;
		$psid=$r->pay_scale_id;
		
	$q1 = "select * from pay_commission where id='$pcid'";
	$qr1 = mysqli_query($conn,$q1) or die($q1.mysqli_error($conn));
	while($r1 = mysqli_fetch_object($qr1))
	{
		$pid=$r1->id;
		$cname=$r1->commission_name;
	}
	$q2 = "select * from pay_scale where id='$psid'";
	$qr2 = mysqli_query($conn,$q2) or die($q2.mysqli_error($conn));
	while($r2 = mysqli_fetch_object($qr2))
	{
		$sid=$r2->id;
		$min=$r2->minimum;
		$grade=$r2->grade_pay;
		$max=$r2->maximum;
	}
		$sub.="<tr><td>$i</td><td>$name</td><td>$cname</td><td>$min-$grade-$max</td>
		<td><a href='designation_edit.php?id=$id'><i class='fa fa-pencil'></i></a></td>
		<td><a href='designation_delete.php?id=$id'><i class='fa fa-trash'></i></a></td></tr>";
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
	 <h2 class='w3-left'>Designation List</h2>
     <a href='designation.php' style='margin-top:10px;' title='Add Designation' class='w3-right w3-button w3-circle w3-red'>Add</a>
</div>
<table class='w3-table-all w3-hoverable'>
     <tr><th>SL No.</th>
		 <th><a href='designation_list.php?ascdesc=$ascdesc'>Designation Name</a></th>
		 <th>Pay Commission</th>
		 <th>Pay Scale</th>
		 <th>Edit</th>
		 <th>Delete</th>
	 </tr>
	 $sub
</table>

<form action='designation_list.php'>
	Page No<select name='current_page' onchange='this.form.submit();'>
		$p
	</select>
	<input type='hidden' name='page_size' value='10'>
	<input type='hidden' name='ascdesc' value='ascdesc'>
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
