<?php
include_once"globals.php";
include_once"session.php";

$id=$_REQUEST['id'];

if($logged_in) 	 
{
	$loginmenu=afterlogin();
	$i=1;
	$q = "select * from designation";
	$qr = mysqli_query($conn,$q) or die($q.mysqli_error($conn));
	while($r = mysqli_fetch_object($qr))
	{
		$id=$r->id;
		$name=$r->designation_name;
		$pcid=$r->pay_commission_id;
		$psid=$r->pay_scale_id;
		
		$sub.="<tr><th>$i</th><th>$name</th><th>$pcid</th><th>$psid</th>
		<th><a href='designation_edit.php?id=$id'><i class='fa fa-pencil'></i></a></th>
		<th><a href='designation_delete.php?id=$id'><i class='fa fa-trash'></i></a></th></tr>";
		$i++;
	}
$content="
<h3 class='panel-title' align=center><u>Designation List</u></h3>
<table class='table table-striped'>
	 <thead>
		 <tr><th>No.</th>
			 <th>Designation Name</th>
			 <th>Pay Commission Id</th>
			 <th>Pay Scale Id</th>
		 </tr>
	 </thead>
	 <tbody>
	     $sub
	 </tbody>
</table>";
}
else
{
	$content="Please <a href='index.php'>Login</a>";
}
$buff=file_get_contents('template.html');
eval($buff);
echo $page;
?>