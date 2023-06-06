<?php
echo my_base_convert(5,2);
function my_base_convert($number,$tobase = 2){
	$stack = [];//保存所有余数
	while($number){
		$remainder = $number % $tobase;//余数
		array_push($stack,$remainder);//余数入栈
		$number = (int)($number / $tobase);//继续相除	
	}
	$result = '';
	while($stack){
		$result .= array_pop($stack);//倒序出栈
	}
	return $result;
}