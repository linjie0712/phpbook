<?php
$N = 10;
$arr = $old= range(1, 10);
echo "Original:",implode(',',$arr).PHP_EOL;

unset($arr[3]);
unset($arr[7]);
shuffle($arr);
echo "Shuffled:",implode(',',$arr).PHP_EOL;
echo "Lost:",implode(',',array_diff($old, $arr)).PHP_EOL;

$ret = get_missing_nums_by_extra_array($arr,$N);
echo "Extra:",implode(',',$ret).PHP_EOL;

$ret = get_missing_nums_by_calc($arr,$N);
echo "CALC:",implode(',',$ret).PHP_EOL;

$ret = get_missing_nums_by_xor($arr,$N);
echo "XOR:",implode(',',$ret).PHP_EOL;
//通过额外的标记数组来查找缺少的元素。$arr 为打乱后的缺失元素的数组，$N 为 N 的值。
function get_missing_nums_by_extra_array($arr,$N){
    $mark = array_fill(0,$N,false);//生成 N 个元素的标记数组，每个元素的初始值都为 false
    foreach($arr as $v){//将 $arr 的元素依次放到标记数组里。注意数组的下标从 0 开始，所以需要减 1.
        $mark[$v-1] = true;
    }
    $missing_nums = [];
    foreach($mark as $i=>$v){
        if(!$v){//所有值为 false 的元素就是缺少的数字
            $missing_nums[]=$i+1;
        }
    }
    return $missing_nums;
}
//通过计算来查找缺少的元素。$arr 为打乱后的缺失元素的数组，$N 为 N 的值。
function get_missing_nums_by_calc ($arr,$N){
    $sumAll = ($N+1)*$N/2;
    $sumArray = array_sum($arr);
    $sum = $sumAll - $sumArray;
	$avg = ($sumAll - $sumArray)/2;	
	$sumLower = 0;
	$sumHigher = 0;
	foreach ($arr as $i) {
		if($i <= $avg){
			$sumLower += $i;
		}else{
			$sumHigher += $i;		
		}
    }
    $totalLower = $avg*($avg+1)/2;
    $small = $totalLower - $sumLower; 
    $big = $sum - $small;
	return [$small,$big];
}

//通过xor运算来查找缺少的元素。$arr 为打乱后的缺失元素的数组，$N 为 N 的值。
function get_missing_nums_by_xor ($arr,$N){
    $xor = 1;
    for($i = 2;$i<=$N;$i++){
        $xor ^= $i;
    }
    foreach($arr as $v){
        $xor ^= $v;
    }
    //xor必定有2个1
    $right_most_bit = $xor & ~($xor -1);//找出最右边的1组成的值
    $small = $big = 0;
    for($i = 1;$i<=$N;$i++){
        if($i & $right_most_bit){
            $small ^= $i;
        }
    }
    foreach($arr as $v){
        if($v & $right_most_bit){
            $small ^= $v;
        }
    }
    $big = $xor ^ $small;
    return [$small,$big];
}