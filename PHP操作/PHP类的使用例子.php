<?php 
class Person { 
// �˵ĳ�Ա���� 
var $name; //�˵����� 
var $age; //�˵����� 

//�˵ĳ�Ա say() ���� 
function say() { 
echo "�ҵ����ֽУ�".$this->name."<br />"; 
echo "�ҵ������ǣ�".$this->age; 
} 
} 
//�ඨ����� 
//�ⲿ�ļ����������࣬���� include('/data/home/bxu2442650496/htdocs/php/Person.php');
$p1 = new Person(); //ʵ����һ������ 
$p1->name = "Gonn"; //�� $p1 �������Ը�ֵ 
$p1->age = 25; 
$p1->say(); //���ö����е� say()���� 
?> 