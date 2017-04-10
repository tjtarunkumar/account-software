<?php
 session_start();
 include_once"globals.php";
 if(empty($username)) $username= $_SESSION['username'];
 if(empty($password)) $password= $_SESSION['password'];
 $q="select count(*) as total from user where username='$username' and password=PASSWORD('$password')";
 $qr=mysqli_query($conn,$q) or die($q.mysqli_error($conn));
 $r=mysqli_fetch_object($qr);
 $total=$r-> total;
 if($total==1)
 {
   $logged_in=true;
   $_SESSION['username']=$username;
   $_SESSION['password']=$password;
 }
 else
 {
   $logged_in=false;
   session_destroy();
 }
?>