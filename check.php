<?php
session_start();
$uname=$_POST['uname'];
$pswd=$_POST['pswd'];
if($uname=="abc" && $pswd=="xyz"){
	$_SESSION['admin']="true";
	$_SESSION['x']=$uname;
	$_SESSION['z']=$pswd;
	header("Location: admin.php");
}else{
	header("Location: login.php?success=false");
}

?>