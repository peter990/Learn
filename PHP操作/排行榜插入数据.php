<?php
require_once ("PHPStream.php" );

// �����û����ͷ���
$webstream=new PHPStream();
$webstream->BeginRead("123456");
$UserID=$webstream->Read('username');			// user name
$hiscore=$webstream->Read('score');		// hi score
$b=$webstream->EndRead();
if (!$b)
{
	exit("md5 error");
}

// �������ݿ�
$myData=mysqli_connect( "bdm255853338.my3w.com" ,"bdm255853338" ,"19941206");
if ( mysqli_connect_errno()) 
{
	echo mysqli_connect_error();
	return;
}

// У���û����Ƿ�Ϸ�(��ֹSQLע��)
$UserID=mysqli_real_escape_string($myData,$UserID);

// ѡ�����ݿ�
mysqli_query($myData,"set names utf8") ;
mysqli_select_db( $myData ,"bdm255853338_db" );


// ����������
$sql="insert into Hiscores value( 158, '$UserID','$hiscore')";
$bool=mysqli_query($myData,$sql);
echo $bool;

//�ر����ݿ�
mysqli_close($myData); 

?>