<?php
require_once ("PHPStream.php" );

// 读入用户名和分数
$webstream=new PHPStream();
$webstream->BeginRead("123456");
$UserID=$webstream->Read('username');			// user name
$hiscore=$webstream->Read('score');		// hi score
$b=$webstream->EndRead();
if (!$b)
{
	exit("md5 error");
}

// 连接数据库
$myData=mysqli_connect( "bdm255853338.my3w.com" ,"bdm255853338" ,"19941206");
if ( mysqli_connect_errno()) 
{
	echo mysqli_connect_error();
	return;
}

// 校验用户名是否合法(防止SQL注入)
$UserID=mysqli_real_escape_string($myData,$UserID);

// 选择数据库
mysqli_query($myData,"set names utf8") ;
mysqli_select_db( $myData ,"bdm255853338_db" );


// 插入新数据
$sql="insert into Hiscores value( 158, '$UserID','$hiscore')";
$bool=mysqli_query($myData,$sql);
echo $bool;

//关闭数据库
mysqli_close($myData); 

?>