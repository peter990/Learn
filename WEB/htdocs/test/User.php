<?php
	// �������ݿ�
	function conn(){
	$conn01 = mysql_connect("bdm255853338.my3w.com",'bdm255853338','19941206');//root���ʺ�,123456������
	$mycon=mysql_select_db('bdm255853338_db',$conn01); //testdatabase��mysql���ݿ���
	if($mycon){
	//	echo("���ݿ����ӳɹ�");
	}else{
	//	echo("���ݿ�����ʧ��");
	}
	}
	conn();

	class User{

		var $_username;
		var $_password;
	
		function User($username,$password)
		{
			$this->_username= $username;
			$this->_password= $password;
			echo "ִ���˹��캯��";
		}
		
		function select()
		{
			//��ʼ��ѯ  
			$query = "SELECT * FROM TestUser WHERE UserName='$this->_username' AND Password='$this->_password'";  
			//ִ��SQL���  
			$result = mysql_query($query) or die("Error in query: $query. ".mysql_error());  
			//��ʾ���صļ�¼������  
			if(mysql_num_rows($result)>0){  
					echo "True";
				}    
			else{  
				echo "false";  
			}  
		}
		
		function showall()
		{
			echo $this->_username,$this->_password;
			//��ʼ��ѯ  
			$query = "SELECT * FROM TestUser";  
			//ִ��SQL���  
			$result = mysql_query($query) or die("Error in query: $query. ".mysql_error());
			$this->show($result);
		}
		
		function show($result)
		{
			//��ʾ���صļ�¼������  
			if(mysql_num_rows($result)>0){  
				//������ص����ݼ���������0����ʼ�Ա�����ʽ��ʾ  
				echo "<table cellpadding=10 border=1>";  
				echo "<td>�û���</td>";  
				echo "<td>����</td>";  
				echo "<td>ID</td>";  
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
				echo "��¼δ�ҵ���";  
			}  
		}
		function insert()
		{
			//��ʼ��ѯ  
			$query = "INSERT INTO TestUser VALUE('$this->_username','$this->_password',ID=1)";
			//ִ��SQL���  
			$result = mysql_query($query) or die("Error in query: $query. ".mysql_error()); 
			if($result)
				echo "True";
			else echo "false";
		}
		
		function update($updateusername)
		{
			$query = "UPDATE TestUser SET UserName='$updateusername' WHERE UserName='$this->_username'";
			//ִ��SQL���
			$result = mysql_query($query) or die("Error in query: $query. ".mysql_error()); 
		}
		
		function delete()
		{
			$query="DELETE FROM TestUser WHERE UserName='$this->_username'";
			//ִ��SQL���
			$result = mysql_query($query) or die("Error in query: $query. ".mysql_error()); 
		}
		
		function sql($query)
		{
			$result = mysql_query($query) or die("Error in query: $query. ".mysql_error()); 
			show($result);
		}
		
		function _User()
		{
			echo "ִ�����鹹����";
			mysql_free_result($result); 
			//�رո����ݿ����� 
		}
	}
?>