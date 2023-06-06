<?php
// 桶排序
function bucket_sort(&$arr){
    $len = count($arr);
    $buckets = [];
    $maxBucketsLen = 1;
    foreach($arr as $v){
        $bucketIndex = (int)($len * $v);//bucketIndex 表示放到几号桶里
        if($bucketIndex > $maxBucketsLen){
            $maxBucketsLen = $bucketIndex;
        }
        $buckets[$bucketIndex][] = $v;//把整数部分相同的元素放到相同的桶里
    }
    var_dump($buckets);
    for($i = 0;$i < $len;$i++){//每个bucket里的元素用插入排序排好顺序
        insertion_sort($buckets[$i]);
    }
    $index = 0;
    for($i = 0;$i<=$maxBucketsLen;$i++){//合并每个桶里的元素
        if(empty($buckets[$i]))continue;
        for($j = 0;$j<count($buckets[$i]);$j++){
            $arr[$index++] = $buckets[$i][$j];
        }
    }
}
//插入排序，用于辅助桶排序
function insertion_sort(&$arr){
	$len = count($arr);
	for($i=1;$i<$len;$i++){
		$tmp = $arr[$i];
		$j = $i-1;

		while($j >= 0 && $arr[$j] > $tmp){
			$arr[$j+1] = $arr[$j];
			$j = $j - 1;
		}
		$arr[$j+1] = $tmp;
	}
}
$arr = [0.743, 0.365, 0.156, 0.524, 0.265, 0.623];
bucket_sort($arr);
var_dump($arr);