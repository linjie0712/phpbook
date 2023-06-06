<?php
$NUM = 1000000;

$a = microtime(true);
for($i = 0;$i<$NUM;$i++){
	$str = '1'.time().time().time();
	str_reverse_array($str);
}
$b = microtime(true);
var_dump($b - $a);

$a = microtime(true);
for($i = 0;$i<$NUM;$i++){
	$str = '1'.time().time().time();
	str_reverse_tmp($str);
}
$b = microtime(true);
var_dump($b - $a);



$a = microtime(true);
for($i = 0;$i<$NUM;$i++){
	$str = '1'.time().time().time();
	str_reverse_no_copy($str);
}
$b = microtime(true);
var_dump($b - $a);

function str_reverse_tmp($str){
	$tmp = '';
	for($i = strlen($str)-1;$i>=0;$i--){
		$tmp .= $str[$i];
	}
	return $tmp;
}

function str_reverse_no_copy($str){
	// if(empty($str)){
	// 	return $str;
	// }
	$len = strlen($str);
	for($i = 0;$i<=$len/2;$i++){
		$tmp = $str[$i];
		$str[$i] = $str[$len-$i-1];
		$str[$len-$i-1] = $tmp;
	}
	return $str;
}

function str_reverse_array($str){
	$array = [];
	for($i = strlen($str)-1;$i>=0;$i--){
		$array[] = $str[$i];
	}
	return implode($array);
}
