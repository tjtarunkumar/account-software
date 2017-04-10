<?php
function beforemenu()
{         
    $beforemenu.="<a href='index.php' class='w3-bar-item w3-button w3-padding'><i class='fa fa-users fa-fw'></i>  Overview</a>";
    $beforemenu.="<a href='login.php' class='w3-bar-item w3-button w3-padding'><i class='fa fa-users fa-fw'></i>Login</a>";
return($menu);
}

function afterlogin()
{         
    $afterlogin.="  <div class='w3-dropdown-hover'>
                         <button class='w3-button w3-green'><i class='fa'>&#xf19c;</i>Pay Commission</button>
                         <div class='w3-dropdown-content w3-bar-block w3-border'>
                             <a href='pay_commission.php' class='w3-bar-item w3-button'>Add</a>
                             <a href='pay_commission_list.php' class='w3-bar-item w3-button'>List</a>   
                         </div>
                    </div>";
	$afterlogin.="  <div class='w3-dropdown-hover'>
                         <button class='w3-button w3-red'><i class='fa'>&#xf24e;</i>Pay Scale</button>
                         <div class='w3-dropdown-content w3-bar-block w3-border'>
                             <a href='pay_scale.php' class='w3-bar-item w3-button'>Add</a>
                             <a href='pay_scale_list.php' class='w3-bar-item w3-button'>List</a>   
                         </div>
                    </div>";
    $afterlogin.="  <div class='w3-dropdown-hover'>
                         <button class='w3-button w3-brown'><i class='fa'>&#xf2c2;</i>Designation</button>
                         <div class='w3-dropdown-content w3-bar-block w3-border'>
                             <a href='designation.php' class='w3-bar-item w3-button'>Add</a>
                             <a href='designation_list.php' class='w3-bar-item w3-button'>List</a>   
                         </div>
                    </div>";
    $afterlogin.="  <div class='w3-dropdown-hover'>
                         <button class='w3-button w3-pink'><i class='fa fa-users fa-fw'></i>Member</button>
                         <div class='w3-dropdown-content w3-bar-block w3-border'>
                             <a href='member.php' class='w3-bar-item w3-button'>Add</a>
                             <a href='member_list.php' class='w3-bar-item w3-button'>List</a>   
                         </div>
                    </div>";
	$afterlogin.="<a href='change_password.php' class='w3-bar-item w3-button w3-padding'><i class='fa'>&#xf0b1;</i>Change Password</a>";
    $afterlogin.="<a href='logout.php' class='w3-bar-item w3-button w3-padding'><i class='fa'>&#xf011;</i>Logout</a>";
return($afterlogin);
}
?>
