<?php

require_once ("PHPStream.php" );


// 连接数据库
$myData=mysqli_connect( "bdm255853338.my3w.com" ,"bdm255853338" ,"19941206" );
if ( mysqli_connect_errno())
{
	echo mysqli_connect_error();
	return;
}

// 选择数据库
mysqli_query($myData,"set names utf8") ;
mysqli_select_db( $myData ,"bdm255853338_db" );


// 查讯
$sql = "SELECT name, score FROM Hiscores ORDER by score DESC LIMIT 20 ";

$result = mysqli_query($myData,$sql)or die("<br>SQL error!<br/>");
$num_results = mysqli_num_rows($result);

// 准备发送数据到Unity
$webstream=new PHPStream();
$webstream->BeginWrite(PKEY);

// 发送排行榜分数的数量
$webstream->WriteInt($num_results);

for($i = 0; $i < $num_results; $i++)
{
	$row = mysqli_fetch_array($result ,MYSQLI_ASSOC);

	$data[$i][0]=$row['name'];
	$data[$i][1]=$row['score'];
	
	//发送用户名和得分
	$webstream->WriteString($data[$i][0]);
	$webstream->WriteString($data[$i][1]);
	
	//echo $data[$i][0];
	//echo $data[$i][1];
}

$webstream->EndWrite();

mysqli_free_result($result);

// 关闭数据库
mysqli_close($myData); 

// 发送
echo $webstream->bytes;

?>