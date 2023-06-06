<?php
$a = 1;//本文件内的全局变量
function test(){
	$a = 2;//局限在函数范围之内
	echo $a;
}
test();//输出 2
echo PHP_EOL;
echo $a;//输出 1