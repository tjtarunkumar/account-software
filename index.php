<?php
include_once "globals.php";

$content="<div class='w3-container w3-half'>
  <h2>Login Form</h2>

	<form class='w3-container' method='post' action='home.php'>
 	 <p>
  		<label>UserName</label>
  		<input class='w3-input w3-border w3-round' type='text' name='username' value='$username'>
    </p>
  	<p>
  		<label>Password</label>
  		<input class='w3-input w3-border w3-round' type='password' name='password' value='$password'>
    </p>
  			<button type='submit' class='w3-button w3-block w3-teal'>Login </button> 
	</form>
</div>";
$buf=file_get_contents("template1.html");
eval($buf);
echo $page;
?>
