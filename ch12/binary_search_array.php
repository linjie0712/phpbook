<?php
$array = [1,3,7,8,9,10];
echo binary_search(7,$array);
//$num 为需要查找的数字，$array 为目标数组。如果找到则返回下标，找不到则返回-1.
function binary_search($num,$array){
	$left = 0;//左下标指向第一个元素下标
	$right = count($array)-1;//右下标指向最后一个元素下标
	while ($left <= $right) {
		$mid = (int)(($left + $right) / 2);//取中间元素
		if($array[$mid] == $num){//找到则返回下标
			return $mid;
		}else if($array[$mid] < $num){//小于则左下标移到中间元素的下一个
			$left = $mid + 1;
		}else{//大于则右下标移到中间元素的上一个
			$right = $mid -1;
		}
	}
	return -1;//找不到则返回-1
}