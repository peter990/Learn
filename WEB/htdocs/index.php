<?
function conn(){
$conn01 = mysql_connect("bdm255853338.my3w.com",'bdm255853338','19941206');//root���ʺ�,123456������
$mycon=mysql_select_db('bdm255853338_db',$conn01); //testdatabase��mysql���ݿ���
if($mycon){
echo("���ݿ����ӳɹ�");
}else{
echo("���ݿ�����ʧ��");
}
}
?>
<?
conn();
	
	//��ʼ��ѯ  
    $query = "SELECT * FROM ZZZHiscores";  
    //ִ��SQL���  
    $result = mysql_query($query) or die("Error in query: $query. ".mysql_error());  
    //��ʾ���صļ�¼������  
	echo "<head><meta charset='utf-8'></head>";
    if(mysql_num_rows($result)>0){  
        //������ص����ݼ���������0����ʼ�Ա������ʽ��ʾ 
		echo "<form name='form1' method='post' action='login/login/index.html'>";
        echo "<table cellpadding=10 border=1>";  
        while($row=mysql_fetch_row($result)){  
            echo "<tr>";  
            echo "<td>".$row[0]."</td>";  
            echo "<td>".$row[1]."</td>";  
            echo "<td>".$row[2]."</td>";  
            echo "</tr>";  
        }  
        echo "</table>";  
		echo "<button type='submit'>Click Me!</button>";
    }  
    else{  
        echo "��¼δ�ҵ���";  
    }  
    //�ͷż�¼����ռ�õ��ڴ�  
    mysql_free_result($result); 
?>