<?php

require_once ("PHPStream.php" );


// �������ݿ�
$myData=mysqli_connect( "bdm255853338.my3w.com" ,"bdm255853338" ,"19941206" );
if ( mysqli_connect_errno())
{
	echo mysqli_connect_error();
	return;
}

// ѡ�����ݿ�
mysqli_query($myData,"set names utf8") ;
mysqli_select_db( $myData ,"bdm255853338_db" );


// ��Ѷ
$sql = "SELECT name, score FROM Hiscores ORDER by score DESC LIMIT 20 ";

$result = mysqli_query($myData,$sql)or die("<br>SQL error!<br/>");
$num_results = mysqli_num_rows($result);

// ׼���������ݵ�Unity
$webstream=new PHPStream();
$webstream->BeginWrite(PKEY);

// �������а����������
$webstream->WriteInt($num_results);

for($i = 0; $i < $num_results; $i++)
{
	$row = mysqli_fetch_array($result ,MYSQLI_ASSOC);

	$data[$i][0]=$row['name'];
	$data[$i][1]=$row['score'];
	
	//�����û����͵÷�
	$webstream->WriteString($data[$i][0]);
	$webstream->WriteString($data[$i][1]);
	
	//echo $data[$i][0];
	//echo $data[$i][1];
}

$webstream->EndWrite();

mysqli_free_result($result);

// �ر����ݿ�
mysqli_close($myData); 

// ����
echo $webstream->bytes;

?>