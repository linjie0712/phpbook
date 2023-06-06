<?php
$a = 1;//本文件内的全局变量
function test(){
	global $a;//使用global引用全局变量
	echo $a;
}
test();//输出 1
echo PHP_EOL;
echo $a;//输出 1