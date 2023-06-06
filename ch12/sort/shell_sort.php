<?php
//希尔排序
 function shell_sort(&$arr){
 	$size = count($arr);//$arr 的数组长度

 	for($gap = (int)($size/2);$gap >0;$gap = (int)($gap/2)){
 		for($i = $gap;$i<$size;$i++){
 			$tmp = $arr[$i];
	 		for($j=$i;$j>=$gap && $arr[$j-$gap]>$tmp;$j-=$gap){
	 			$arr[$j] = $arr[$j-$gap];
	 		}
	 		$arr[$j]=$tmp;
 		}
 	}
 }
 $arr = [1,3,5,2,4];
shell_sort($arr);
var_dump($arr);