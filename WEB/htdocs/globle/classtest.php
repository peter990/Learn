<?php
class Test{
	var $a;
	var $b;
	
	function __construct($x,$y) {
        echo "构造函数执行了";
		$a = $x;
		$b = $y;
    }
	function show(){
		$GLOBALS['c'] = $GLOBALS['a'] + $GLOBALS['b']; 
		echo $c;
	}
	function __destruct() {
        print "析构函数执行了";
    }
}
?>