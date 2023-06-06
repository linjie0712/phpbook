<?php
$array = [1,3,5];
//普通函数实现
function square($x){
	return $x*$x;
}
$array1 = array_map('square',$array);
//闭包实现
$square = function($x){return $x*$x;};
$array2 = array_map($square, $array);

var_dump($array1,$array2);
//output:[1,9,25]