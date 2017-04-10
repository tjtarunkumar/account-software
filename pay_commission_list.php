<?php
include_once"globals.php";
include_once"session.php";

$id=$_REQUEST['id'];

if($logged_in) 	 
{
	$loginmenu=afterlogin();
	$i=1;
	$q = "select * from pay_commission";
	$qr = mysqli_query($conn,$q) or die($q.mysqli_error($conn));
	while($r = mysqli_fetch_object($qr))
	{
		$id=$r->id;
		$name=$r->commission_name;
		
		$sub.="<tr><th>$i</th><th>$name</th><th><a href='pay_commission_edit.php?id=$id'><i class='fa fa-pencil'></i></a></th>
		<th><a href='pay_commission_delete.php?id=$id'><i class='fa fa-trash'></i></a></th></tr>";
		$i++;
	}
$content="<section id='blog' class='container'><div class='cl'>
<div class='row'>
     <div class='col-md-12'>
         <div class='panel panel-info'>
            <div class='panel-heading'>
              <h3 class='panel-title' align=center><u>Question List</u></h3>
            </div>
            <div class='panel-body'>
             <table class='table table-striped'>
				 <thead>
					 <tr><th>No.</th>
						 <th>Commission Name</th>
						 
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