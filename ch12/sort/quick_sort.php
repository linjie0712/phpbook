<?php
// 快速排序
function quick_sort(&$arr,$low,$high){
	if($low < $high){
		$pi = partition($arr,$low,$high);//分区
		quick_sort($arr,$low,$pi-1);//递归调用，处理从 $low 到 $pi - 1 的子序列
		quick_sort($arr,$pi+1,$high);//递归调用，处理从  $pi - 1 到 $high 的子序列
	}
}
// 分区操作
function partition(&$arr,$low,$high){
	$pivot = $arr[$high];//选择最后 1 个元素作为基准
	$i = $low -1;
	for($j=$low;$j<=$high-1;$j++){//将 $low 到 $high 的序列，以 $pivot 为基准，分为两部分
		if($arr[$j] <= $pivot){
			$i++;
			list($arr[$i],$arr[$j]) = [$arr[$j],$arr[$i]];//交换 $i 和 $j 的元素
		}
	}
	list($arr[$i+1],$arr[$high]) = [$arr[$high],$arr[$i+1]];//交换 $i+1 和 $high 的元素
	return $i+1;
}
$arr = [1,3,5,2,4];
quick_sort($arr,0,count($arr)-1);
var_dump($arr);