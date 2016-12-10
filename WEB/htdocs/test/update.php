<?php
	$username=$_POST['username'];
	$updateusername=$_POST['updateusername'];
	include('/data/home/bxu2442650496/htdocs/test/User.php');
	$user=new User($username,'');
	$user->update($updateusername);
	$user->showall();
?>