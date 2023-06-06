<?php
// 冒泡排序
function bubble_sort(&$arr){
    $len = count($arr);
    $swap = false;//标记本次循环有无错误次序的元素需要交换位置
	for($i = 0;$i < $len;$i++){
        for($j = 0;$j < $len - $i - 1;$j++){
            if($arr[$j] > $arr[$j+1]){//为错误次序的元素交换位置
                $tmp = $arr[$j];
                $arr[$j] = $arr[$j+1];
                $arr[$j+1] = $tmp;
                $swap = true;
            }

        }
        if(!$swap){//本次无元素要交换位置，说明所有元素都有序，可以退出了
            break;
        }
    }
}
$arr = [1,3,5,2,4];
bubble_sort($arr);
var_dump($arr);