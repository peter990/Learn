<?php 
class Person { 
// �˵ĳ�Ա���� 
var $name; //�˵����� 
var $age; //�˵����� 

function _Person(){
	echo "ִ���˹��캯��";
}
//�˵ĳ�Ա say() ���� 
function say() { 
echo "�ҵ����ֽУ�".$this->name."<br />"; 
echo "�ҵ������ǣ�".$this->age; 
} 
} 
?>