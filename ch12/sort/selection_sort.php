<?php
//选择排序
function selection_sort(&$arr){
	$len = count($arr);
	for($i = 0;$i < $len;$i++){
		$min = $i;
		for($j = $i+1;$j<$len;$j++){//取出剩余序列中的最小值
			if($arr[$j] < $arr[$min]){
				$min = $j;
			}
		}

		if($arr[$i] > $arr[$min]){//将i位置的元素与最小值交换，即把最小值放到最终位置
			$tmp = $arr[$i];
			$arr[$i] = $arr[$min];
			$arr[$min] = $tmp;
		}
	}
}

$arr = [1,3,5,2,4];
selection_sort($arr);
var_dump($arr);