<?php
include_once "globals.php";
include_once"session.php";
$id=$_REQUEST['id'];

if($logged_in) 	 
{	
	$loginmenu=afterlogin("designation");
	$wel="Welcome Mr.<strong><font color=green> ".ucwords($username)."</font></strong>";
	
	
	if($caller=="self")
	{
		$erros=array();
		if(empty($designation_name))      $errors['designation_name']="<font color=red>Empty</font>";
		else
		{
			$q = "select count(*) as total from designation where designation_name='$designation_name' and id<>$id";
			$qr = mysqli_query($conn,$q) or die($q.mysqli_error($conn));
			$r=mysqli_fetch_object($qr);
			$total=$r->total;
			if($total>0)
			{
				$errors['designation_name'] = "<font color='red'>Duplicate</font>";
			}
		}
		if(empty($pay_commission_id))      $errors['pay_commission_id']="<font color=red>Empty</font>";
		if(empty($pay_scale_id))           $errors['pay_scale_id']="<font color=red>Empty</font>";
		
		if(empty($errors))
		{
			$q3="update designation set designation_name='$designation_name', pay_commission_id='$pay_commission_id', pay_scale_id='$pay_scale_id' where id='$id'";
			$qr3=mysqli_query($conn,$q3) or die($q3.mysqli_error($conn));
			$success= "<font color=green>Record Saved Successfully</font>";
		}
	}else{
			$q4 ="select * from designation where id='$id'";
			$qr4 = mysqli_query($conn,$q4) or die($q4.mysqli_error($conn));
			while($r4 = mysqli_fetch_object($qr4))
			{
				$designation_name=$r4->designation_name;
				$pay_commission_id=$r4->pay_commission_id;
				$pay_scale_id=$r4->pay_scale_id;
		
				$pcid.="<option value='$pay_cid' selected>$pay_cid</option>";
				$psid.="<option value='$pay_sid' selected>$pay_sid</option>";
			}
		}
		
		$pcid = "";
		$q2 = "select * from pay_commission";
		$qr2 = mysqli_query($conn,$q2) or die($q2.mysqli_error($conn));
		while($r = mysqli_fetch_object($qr2))
		{
			$pay_com_id = $r->id;
			$com_name = $r->commission_name;
			if($pay_commission_id == $pay_com_id)
				$pcid.="<option value='$pay_com_id' selected>$com_name</option>";
			else
				$pcid.="<option value='$pay_com_id'>$com_name</option>";
		}
		$psid = "";
		$q1 = "select * from pay_scale";
		$qr1 = mysqli_query($conn,$q1) or die($q1.mysqli_error($conn));
		while($r1 = mysqli_fetch_object($qr1))
		{
			$pay_sc_id = $r1 -> id;
			$min = $r1 -> minimum;
			$grade = $r1 -> grade_pay;
			$max = $r1 -> maximum;
			if($pay_sc_id == $pay_scale_id)
				$psid.="<option value='$pay_sc_id' selected>$min-$grade-$max</option>";
			else
				$psid.="<option value='$pay_sc_id'>$min-$grade-$max</option>";
		}
		

$content="
<div class='w3-container w3-blue'>
     <h2>Edit Designation</h2>
</div>
	$success
<form class='w3-container' method='post'>
	 <p><label>Select Pay Commission</label>
	     <select name='pay_commission_id' class='w3-input' id='pid'>
			 <option value=''>Select</option>
				$pcid
		 </select>
	 </p>$errors[pay_commission_id]
	 <p><label>Select Pay Scale</label>
		 <select name='pay_scale_id' class='w3-input' id='pscid'>
			 <option value=''>Select</option>
				$psid
		 </select>
	 </p>$errors[pay_scale_id]
	 <p><label>Designation Name</label>
	     <input class='w3-input' type='text' name='designation_name' value='$designation_name'>
	 </p>$errors[designation_name]
	 
	 <input type='hidden' name='caller' value='self'>
     <input type='hidden' name='id' value='$id'>
     <button class='w3-input w3-blue' type='submit'>Save</button> 
</form>
<script src='https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js'></script>
<script type='text/javascript'>
$(document).ready(function(){
	var i=0;
	$(document).on('change','#pid',function(){
		var a = $(this).val();
		$.post('ajax_designation.php', { 'pid' : a },function(data) {
    												var sel = $('#pscid');
    												sel.empty();
                                                    sel.append('<option value=\"\">Select</option>');
   													 for (var i=0; i<data.length; i++) {
      													sel.append('<option value=' + data[i].pay_sc_id + '>'+data[i].min+'-'+data[i].grade+'-'+data[i].max+'</option>');
    												}
  												  }, 
                'json');
	});
});
</script>
";
}
else
{
	$content="Please <a href='index.php'>Login</a>";
}
$buf=file_get_contents("template.html");
eval($buf);
echo $page;
?>
