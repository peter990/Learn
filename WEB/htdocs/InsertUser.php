<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>�����û�</title>
</head>

<body>
<?php
	$username = $_POST['UserName'];
	$password = $_POST['Password'];
	try {
    $dbname="bdm255853338";
    $dbpass="19941206";
    $dbhost="bdm255853338.my3w.com";
    $dbdatabase="bdm255853338_db";
 
    //����һ������
    $db_connect= new mysqli($dbhost,$dbname,$dbpass,$dbdatabase);
    // ��ȡ��ѯ���
	$strsql="insert into ZZZUser value('$username','$password')";
    $result=$db_connect->query($strsql);
    $strsql1="select * from ZZZUser";
    $result1=$db_connect->query($strsql1);
	echo "<head><meta charset='utf-8'></head>";
	echo "<body align='center'>";
	echo "<form name='form1' method='post' action='login/login/index.html'>";
    echo "<table cellpadding=10 border=1>";  
	echo "<td>�û���</td>";
	echo "<td>����</td>";
    // ѭ��ȡ����¼
    while ($row=mysqli_fetch_assoc($result1))
    {
      echo "<tr>";  
            echo "<td>".$row['UserName']."</td>";  
            echo "<td>".$row['Password']."</td>";  
      echo "</tr>";  
    }
	 echo "</table>";  
	 echo "<button type='submit'>Click Me!</button>";
	 echo "</body>";
    // �ͷ���Դ
    //$result->close();
	$result1->close();
    // �ر�����
    $db_connect->close();
}
catch (Exception $e){}
?> 
</body>
</html>