<?php
$ret = check_bom('./file_with_bom.txt');
var_dump($ret);
//Output: true

$ret = check_bom('./file_without_bom.txt');
var_dump($ret);
//Output: false
function check_bom($filename){
	$bomchars = "efbbbf";//bom头
	$handle = fopen($filename, "rb");//以二进制只读方式打开文件
	$contents = fread($handle, 3);	//读取前3个字符
	$head = strval(bin2hex($contents));//将二进制转换为十六进制
	fclose($handle);//文件使用完毕，关闭之
	return $head == $bomchars;//与bom头对比
}

