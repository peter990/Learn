<?
	function conn(){
	$conn01 = mysql_connect("bdm255853338.my3w.com",'bdm255853338','19941206');//root是帐号,123456是密码
	$mycon=mysql_select_db('bdm255853338_db',$conn01); //testdatabase是mysql数据库名
	if($mycon){
		//echo("数据库连接成功");
	}else{
		echo("数据库连接失败");
	}
}
	conn();
	$user = $_POST['username'];
	$password = $_POST['password'];
	//echo 'username is '.$user.' and password is'.$password;
	$query = "SELECT * FROM User WHERE UserName='$user'&&Password='$password'";
	$result = mysql_query($query) or die("Error in query: $query. ".mysql_error());
	if(mysql_num_rows($result)>0)
	{
		echo "True";
	}

	else echo "false";

	mysql_free_result($result); 
?>