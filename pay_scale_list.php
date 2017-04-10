<?php
include_once"globals.php";
include_once"session.php";

$id=$_REQUEST['id'];

if($logged_in) 	 
{
	$loginmenu=afterlogin();
	$i=1;
	$q = "select * from pay_scale";
	$qr = mysqli_query($conn,$q) or die($q.mysqli_error($conn));
	while($r = mysqli_fetch_object($qr))
	{
		$id=$r->id;
		$min=$r->minimum;
		$grade=$r->grade_pay;
		$max=$r->maximum;
		$pay=$r->pay_name;
		$entry=$r->entry_pay;
		
		$sub.="<tr><th>$i</th><th>$min</th><th>$grade</th><th>$max</th><th>$pay</th><th>$entry</th>
		<th><a href='pay_scale_edit.php?id=$id'><i class='fa fa-pencil'></i></a></th>
		<th><a href='pay_scale_delete.php?id=$id'><i class='fa fa-trash'></i></a></th></tr>";
		$i++;
	}
$content="<section id='blog' class='container'><div class='cl'>
<div class='row'>
     <div class='col-md-12'>
         <div class='panel panel-info'>
            <div class='panel-heading'>
              <h3 class='panel-title' align=center><u>Pay Scale List</u></h3>
            </div>
            <div class='panel-body'>
             <table class='table table-striped'>
				 <thead>
					 <tr><th>No.</th>
						 <th>Minimum</th>
						 <th>Grade</th>
						 <th>Maximum</th>
						 <th>Pay Name</th>
						 <th>Entry Pay</th>
					 </tr>
				 </thead>
				 <tbody>
				 $sub
				 </tbody>
			 </table>
            </div>
         </div>
	 </div></div>
</div></section>";
}
else
{
	$content="Please <a href='admin_login.php'>Login</a>";
}
$buff=file_get_contents('template.html');
eval($buff);
echo $page;
?>