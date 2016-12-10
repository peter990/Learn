<?php
	try {
    $dbname="bdm255853338";
    $dbpass="19941206";
    $dbhost="bdm255853338.my3w.com";
    $dbdatabase="bdm255853338_db";
 
    //生成一个连接
    $db_connect= new mysqli($dbhost,$dbname,$dbpass,$dbdatabase);
    // 获取查询结果
    $strsql="select * from ZZZUser";
    $result=$db_connect->query($strsql);
	echo "<head><meta charset='utf-8'></head>";
	echo "<form name='form1' method='post' action='login/login/index.html'>";
    echo "<table cellpadding=10 border=1>";  
    // 循环取出记录
    while ($row=mysqli_fetch_assoc($result))
    {
      echo "<tr>";  
            echo "<td>".$row['UserName']."</td>";  
            echo "<td>".$row['Password']."</td>";  
      echo "</tr>";  
    }
	 echo "</table>";  
	 echo "<button type='submit'>Click Me!</button>";
    // 释放资源
    $result->close();
    // 关闭连接
    $db_connect->close();
}
catch (Exception $e){}
?>