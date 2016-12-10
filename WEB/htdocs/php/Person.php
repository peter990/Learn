<?php 
class Person { 
// 人的成员属性 
var $name; //人的名字 
var $age; //人的年龄 

function _Person(){
	echo "执行了构造函数";
}
//人的成员 say() 方法 
function say() { 
echo "我的名字叫：".$this->name."<br />"; 
echo "我的年龄是：".$this->age; 
} 
} 
?>