<?php
include_once"globals.php";
include_once"session.php";

$id=$_REQUEST['id'];

if($logged_in) 	 
{
	 $loginmenu=afterlogin("pay_scale");
     $wel="Welcome Mr.<strong><font color=green> ".ucwords($username)."</font></strong>";
	 $sp = "";
     $q3="select * from pay_commission";
	 $qr3=mysqli_query($conn,$q3) or die($q3.mysql_error($conn));
	 while($r3=mysqli_fetch_object($qr3))
	{
		$payid=$r3->id;
		$name=$r3->commission_name;
		if($pay_commission_id == $payid) $sp.="<option value='$payid' selected>$name</option>";
		else $sp.="<option value='$payid'>$name</option>";
	}

		if($caller=="self")
		{
			$conditions=array();
			
			if(!empty($pay_commission_id)) $conditions[pay_commission_id]="pay_commission_id=$pay_commission_id";
			if(empty($page_size)) $page_size=10;
			if(empty($current_page)) $current_page=1;
	     
			 $q1="select count(*) as total from pay_scale where pay_commission_id='$pay_commission_id'";
			 $qr1=mysqli_query($conn,$q1) or die($q1.mysql_error($conn));
			 $r1=mysqli_fetch_object($qr1);
			 $total_records=$r1->total;
			 
			if($total_records%$page_size==0)
			 $total_pages=$total_records/$page_size;
			else
			 $total_pages=ceil($total_records/$page_size);
			
			$index=($current_page-1)*$page_size;
			
			if(empty($conditions)) $conditions['error']="<font color=red>Please Select Pay Commission</font>";
			else
			{
				$condition=implode(" and ",$conditions);
				$q="select *  from pay_scale where $condition limit $index,$page_size";
			
				$list="<tr><th>SL No.</th>
						 <th>Minimum Band</th>
						 <th>Grade Pay</th>
						 <th>Maximum Band</th>
						 <th>Pay Band Name</th>
						 <th>Entry Pay Band</th>
						 <th>Edit</th>
						 <th>Delete</th>
						</tr>";
			if($current_page>1) $j=($current_page-1)*($page_size)+1;
			else $j=1;
			
			$qr=mysqli_query($conn,$q) or die( $q.mysqli_error($conn));
			while($r=mysqli_fetch_object($qr))
			{	
				$id=$r->id;
				$min=$r->minimum;
				$grade=$r->grade_pay;
				$max=$r->maximum;
				$pay=$r->pay_name;
				$entry=$r->entry_pay;
				
				
				$sub.="<tr><td>$j</td><td>$min</td><td>$grade</td><td>$max</td><td>$pay</td><td>$entry</td>
				<td><a href='pay_scale_edit.php?id=$id'><i class='fa fa-pencil'></i></a></td>
				<td><a href='pay_scale_delete.php?id=$id'><i class='fa fa-trash'></i></a></td></tr>";
				$j++;
			}
			
			$p = "<form action='pay_scale_list.php'>
						Page No<select name='current_page' onchange='this.form.submit();'>";
			for($i=1; $i<=$total_pages; $i++)
			{
				if($i==$current_page)
				$p.= "<option value='$i' selected>$i</option>";
				else
				$p.= "<option value='$i'>$i</option>;";
			}
            
            $p .= "</select>
						<input type='hidden' name='page_size' value='10'>
						<input type='hidden' name='pay_commission_id' value='$pay_commission_id'>
						<input type='hidden' name='caller' value='self'>
				</form>";

		}
		
}
$content="<div class='w3-container w3-blue'>
     		<h2 class='w3-left'>Pay Scale List</h2>
            <a href='pay_scale.php' style='margin-top:10px;' title='Add Pay Scale' class='w3-right w3-button w3-circle w3-red'>Add</a>
		</div>
<div class='w3-half'>
	<form method='post' class='w3-container'>
    	<label class='w3-third'><b>Pay Commission</b></label>
		 <select name='pay_commission_id' class='w3-input w3-third'>
			 <option value=''>Select</option>
				$sp
	 	</select>
        <div class='w3-third'>
        	&nbsp;&nbsp;&nbsp;
	 		<button class='w3-button w3-green' type='submit'>Search</button>$conditions[error]
	 		<input type=hidden name=caller value=self>
        </div>
	</form>
</div>
<table class='w3-table-all w3-hoverable'>
$list
	 $sub
</table> 
  <!--Page No -->
		$p
	
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
