<?php
function beforemenu()
{         
    $beforemenu.="<a href='index.php' class='w3-bar-item w3-button w3-padding'><i class='fa fa-users fa-fw'></i>  Overview</a>";
    $beforemenu.="<a href='login.php' class='w3-bar-item w3-button w3-padding'><i class='fa fa-users fa-fw'></i>Login</a>";
return($menu);
}

function afterlogin($active)
{

	if($active=="dashboard"){
    	$afterlogin.="<a href='home.php' class='w3-bar-item w3-button w3-padding w3-blue'><i class='fa fa-dashboard'></i>  Dashboard</a>";
    }else
    {
    	$afterlogin.="<a href='home.php' class='w3-bar-item w3-button w3-padding'><i class='fa fa-dashboard'></i>  Dashboard</a>";
    }

	if($active=="pay_commission"){
    	$afterlogin.="<a href='pay_commission_list.php' class='w3-bar-item w3-button w3-padding w3-blue'><i class='fa'>&#xf19c;</i>  Pay Commission</a>";
    }else
    {
    	$afterlogin.="<a href='pay_commission_list.php' class='w3-bar-item w3-button w3-padding'><i class='fa'>&#xf19c;</i>  Pay Commission</a>";
    }

	if($active=="pay_scale"){
    	$afterlogin.="<a href='pay_scale_list.php' class='w3-bar-item w3-button w3-padding w3-blue'><i class='fa'>&#xf24e;</i>  Pay Scale</a>";
    }else
    {
    	$afterlogin.="<a href='pay_scale_list.php' class='w3-bar-item w3-button w3-padding'><i class='fa'>&#xf24e;</i>  Pay Scale</a>";
    }

	if($active=="designation"){
    	$afterlogin.="<a href='designation_list.php' class='w3-bar-item w3-button w3-padding w3-blue'><i class='fa'>&#xf2c2;</i>  Designation</a>";
    }else
    {
    	$afterlogin.="<a href='designation_list.php' class='w3-bar-item w3-button w3-padding'><i class='fa'>&#xf2c2;</i>  Designation</a>";
    }

	if($active=="employee"){
    	$afterlogin.="<a href='employee_list.php' class='w3-bar-item w3-button w3-padding w3-blue'><i class='fa fa-users fa-fw'></i>  Employee</a>";
    }else
    {
    	$afterlogin.="<a href='employee_list.php' class='w3-bar-item w3-button w3-padding'><i class='fa fa-users fa-fw'></i>  Employee</a>";
    }
	
	if($active=="change_password"){
    	$afterlogin.="<a href='change_password.php' class='w3-bar-item w3-button w3-padding w3-blue'><i class='fa'>&#xf0b1;</i> Change Password</a>";
    }else
    {
    	$afterlogin.="<a href='change_password.php' class='w3-bar-item w3-button w3-padding'><i class='fa'>&#xf0b1;</i> Change Password</a>";
    }
	
    $afterlogin.="<a href='logout.php' class='w3-bar-item w3-button w3-padding'><i class='fa'>&#xf011;</i> Logout</a>";
return($afterlogin);
}
?>
