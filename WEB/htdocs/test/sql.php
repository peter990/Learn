<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>��дSQL������</title>
</head>
<?php
	$sql = $_POST['sql'];
	include('/data/home/bxu2442650496/htdocs/test/User.php');
	$user = new User("","");
	$user->sql($sql);
	$user->show();
?>
<body>
</body>
</html>
