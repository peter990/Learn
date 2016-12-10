<?php
	$username=$_POST['username'];
	$password=$_POST['password'];
	include('/data/home/bxu2442650496/htdocs/test/User.php');
	$user = new User('$username','$password');
	$user->select();
	//$user->show();
?>