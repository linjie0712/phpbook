<?php
// 插入排序
function insertion_sort(&$arr){
	$len = count($arr);
	for($i=1;$i<$len;$i++){//$i从下标1开始，说明假定下标0的元素为有序序列
		$tmp = $arr[$i];
		$j = $i-1;

		while($j >= 0 && $arr[$j] > $tmp){//为下标为 $i 的元素，从后往前找相应位置
			$arr[$j+1] = $arr[$j];
			$j = $j - 1;
		}
		$arr[$j+1] = $tmp;//将下标为 $i 的元素，放在相应位置
	}
}
$arr = [1,3,5,2,4];
insertion_sort($arr);
var_dump($arr);