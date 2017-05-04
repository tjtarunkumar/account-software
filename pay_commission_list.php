<?php
include_once"globals.php";
include_once"session.php";

if($logged_in) 	 
{
	$loginmenu=afterlogin("pay_commission");
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
	
	$q="select count(*) as total from pay_commission";
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

	$q="select * from pay_commission order by commission_name $ascdesc limit $index,$page_size ";
	$qr=mysqli_query($conn,$q) or die($q.mysql_error($conn));
	while($r=mysqli_fetch_object($qr))
	{
		$id=$r->id;
		$name=$r->commission_name;
			
		$sub.="<tr><td>$i</td><td>$name</td><td><a href='pay_commission_edit.php?id=$id'><i class='fa fa-pencil'></i></a></td>
		<td><a href='pay_commission_delete.php?id=$id'><i class='fa fa-trash'></i></a></td><tr>";
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
    <h2 class='w3-left'>Pay Commission List</h2>
    <a href='pay_commission.php' style='margin-top:10px;' title='Add Commission' class='w3-right w3-button w3-circle w3-red'>Add</a>
</div>
<table class='w3-table-all w3-hoverable'>
	 <tr>
		 <th>Sl. No.</th>
		 <th><a href='pay_commission_list.php?ascdesc=$ascdesc'>Commission Name</a></th>
		 <th>Edit</th>
		 <th>Delete</th>
	 </tr>
	 $sub
</table>

<form action='pay_commission_list.php'>
	Page No<select name='current_page' onchange='this.form.submit();'>
		$p
	</select>
	<input type='hidden' name='page_size' value='10'>
	<input type='hidden' name='ascdesc' value='ascdesc'>
</form>
";
}
else
{
	$content="Please <a href='index.php'>Login</a>";
}
$buff=file_get_contents('template.html');
eval($buff);
echo $page;
?>
