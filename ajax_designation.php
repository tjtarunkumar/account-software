<?php
include_once"globals.php";
include_once"session.php";

	$pid = $_REQUEST['pid'];
	$x = array();
    $q1="select * from pay_scale where pay_commission_id ='$pid' ";
	$qr1=mysqli_query($conn,$q1) or die($q1.mysqli_error($conn));
	while($r1 = mysqli_fetch_object($qr1))
	{
		$x[] = array("pay_sc_id"=>$r1->id,"min"=>$r1->minimum, "grade"=>$r1->grade_pay,"max"=>$r1->maximum);
	}
		echo json_encode($x);  
?>
