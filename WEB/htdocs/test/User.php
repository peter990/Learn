<?php
	// 连接数据库
	function conn(){
	$conn01 = mysql_connect("bdm255853338.my3w.com",'bdm255853338','19941206');//root是帐号,123456是密码
	$mycon=mysql_select_db('bdm255853338_db',$conn01); //testdatabase是mysql数据库名
	if($mycon){
	//	echo("数据库连接成功");
	}else{
	//	echo("数据库连接失败");
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
			echo "执行了构造函数";
		}
		
		function select()
		{
			//开始查询  
			$query = "SELECT * FROM TestUser WHERE UserName='$this->_username' AND Password='$this->_password'";  
			//执行SQL语句  
			$result = mysql_query($query) or die("Error in query: $query. ".mysql_error());  
			//显示返回的记录集行数  
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
			//开始查询  
			$query = "SELECT * FROM TestUser";  
			//执行SQL语句  
			$result = mysql_query($query) or die("Error in query: $query. ".mysql_error());
			$this->show($result);
		}
		
		function show($result)
		{
			//显示返回的记录集行数  
			if(mysql_num_rows($result)>0){  
				//如果返回的数据集行数大于0，则开始以表格的形式显示  
				echo "<table cellpadding=10 border=1>";  
				echo "<td>用户名</td>";  
				echo "<td>密码</td>";  
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
				echo "记录未找到！";  
			}  
		}
		function insert()
		{
			//开始查询  
			$query = "INSERT INTO TestUser VALUE('$this->_username','$this->_password',ID=1)";
			//执行SQL语句  
			$result = mysql_query($query) or die("Error in query: $query. ".mysql_error()); 
			if($result)
				echo "True";
			else echo "false";
		}
		
		function update($updateusername)
		{
			$query = "UPDATE TestUser SET UserName='$updateusername' WHERE UserName='$this->_username'";
			//执行SQL语句
			$result = mysql_query($query) or die("Error in query: $query. ".mysql_error()); 
		}
		
		function delete()
		{
			$query="DELETE FROM TestUser WHERE UserName='$this->_username'";
			//执行SQL语句
			$result = mysql_query($query) or die("Error in query: $query. ".mysql_error()); 
		}
		
		function sql($query)
		{
			$result = mysql_query($query) or die("Error in query: $query. ".mysql_error()); 
			show($result);
		}
		
		function _User()
		{
			echo "执行了虚构函数";
			mysql_free_result($result); 
			//关闭该数据库连接 
		}
	}
?>