<?php
	try {
    $dbname="bdm255853338";
    $dbpass="19941206";
    $dbhost="bdm255853338.my3w.com";
    $dbdatabase="bdm255853338_db";
 
    //����һ������
    $db_connect= new mysqli($dbhost,$dbname,$dbpass,$dbdatabase);
    // ��ȡ��ѯ���
    $strsql="select * from ZZZUser";
    $result=$db_connect->query($strsql);
	echo "<head><meta charset='utf-8'></head>";
	echo "<form name='form1' method='post' action='login/login/index.html'>";
    echo "<table cellpadding=10 border=1>";  
    // ѭ��ȡ����¼
    while ($row=mysqli_fetch_assoc($result))
    {
      echo "<tr>";  
            echo "<td>".$row['UserName']."</td>";  
            echo "<td>".$row['Password']."</td>";  
      echo "</tr>";  
    }
	 echo "</table>";  
	 echo "<button type='submit'>Click Me!</button>";
    // �ͷ���Դ
    $result->close();
    // �ر�����
    $db_connect->close();
}
catch (Exception $e){}
?>