<?php
function conn()
{
    $conn01 = mysql_connect("bdm255853338.my3w.com", 'bdm255853338', '19941206');//root是帐号,123456是密码
    $mycon = mysql_select_db('bdm255853338_db', $conn01); //testdatabase是mysql数据库名
    if ($mycon) {
        echo("数据库连接成功");
    } else {
        echo("数据库连接失败");
    }
}
    conn();
	//开始查询  
    $query = "SELECT * FROM ZZZHiscores";
    //执行SQL语句  
    $result = mysql_query($query) or die("Error in query: $query. ".mysql_error());  
    //显示返回的记录集行数  
    if(mysql_num_rows($result)>0){  
        //如果返回的数据集行数大于0，则开始以表格的形式显示  
        echo "<table cellpadding=10 border=1>";  
        while($row=mysql_fetch_row($result)){  
            echo "<tr>";  
            echo "<td>".$row[0]."</td>";  
            echo "<td>".$row[1]."</td>";  
            echo "<td>".$row[2]."</td>";  
            echo "</tr>";  
        }  
        echo "</table>";  
    }  
    else{  
        echo "记录未找到！";  
    }  
    //释放记录集所占用的内存
    mysql_free_result($result); 
	//UploadScore.php
	//require_once("PHPStream.php");
	
	//读入用户名与分数
	//$webstream = new PHPStream();
	//$webstream->BeginRead("123456");
	//$UserID = $webstream->Read('username');
	//$hiscore = $webstream->Read('score');
	//$b = $webstream->EndRead();
	if(isset($_POST['username']) && isset($_POST['score']))
	{
		$UserID=$_POST['username'];
		$hiscore=$_POST['score'];
		echo $UserID,$hiscore;
		mysql_query("INSERT INTO Hiscores (id,name, score) VALUES ('158',$UserID,$hiscore)");
	}
?>