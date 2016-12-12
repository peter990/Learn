<?php 
class Person { 
// 人的成员属性 
var $name; //人的名字 
var $age; //人的年龄 

//人的成员 say() 方法 
function say() { 
echo "我的名字叫：".$this->name."<br />"; 
echo "我的年龄是：".$this->age; 
} 
} 
//类定义结束 
//外部文件必须引入类，例如 include('/data/home/bxu2442650496/htdocs/php/Person.php');
$p1 = new Person(); //实例化一个对象 
$p1->name = "Gonn"; //给 $p1 对象属性赋值 
$p1->age = 25; 
$p1->say(); //调用对象中的 say()方法 
?> 