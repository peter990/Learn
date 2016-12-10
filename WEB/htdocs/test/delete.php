
<?php
	$username=$_POST['deleteUserName'];
	include('/data/home/bxu2442650496/htdocs/test/User.php');
	$user=new User($username,"");
	$user->delete();
	$user->showall();
?>