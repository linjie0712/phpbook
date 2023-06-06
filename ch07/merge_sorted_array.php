<?php
$array1 = [1,3,5,7,9];
$array2 = [2,4,6,8,10];
$array = merge_sorted_array($array1,$array2);
var_dump($array);//Output:[1,2,3,4,5,6,7,8,9,10]
function merge_sorted_array($array1, $array2) {
    $m = count($array1);
    $n = count($array2);
    $tail = $m +$n -1;//合并后数组的尾部
    $array1 = $array1 + array_fill($m,$n,NULL); //将array1的长度扩充为$m+$n
    $i = $m -1;//$array1的尾部
    $j = $n -1;//$array2的尾部
    for(;$i>=0 && $j>=0;$tail--){//将$i和$j向前移动，依次处理
        if($array1[$i] >= $array2[$j]){//取较大值，放在尾部
            $array1[$tail] = $array1[$i];
            $i--;
        }else{
            $array1[$tail] = $array2[$j];
            $j--;
        }
    }
    while($j>=0){//如果$array2还未处理完，则将$array2的剩余数据拼接起来
        $array1[$tail] = $array2[$j];
        $tail--;
        $j--;
    }
    return $array1;
}