<?php
include_once "globals.php";
$m=beforemenu();
//$am=amenu();
//$um=umenu();
$content="<div class='w3-container w3-blue'>
  <h2>Input Form</h2>
</div>

<form class='w3-container' method='post' action='home.php'>
  <p>
  <label>UserName</label>
  <input class='w3-input' type='text' name='username' value='$username'></p>

  <p>
  <label>Password</label>
  <input class='w3-input' type='text' name='password' value='$password'></p>
  <button class='w3-input' type='submit' class='btn btn-lg btn-primary btn-block'>Login </button> 
</form>";
$buf=file_get_contents("template.html");
eval($buf);
echo $page;
?>