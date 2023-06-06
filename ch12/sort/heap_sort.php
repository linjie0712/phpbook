<?php
// 堆排序
function heap_sort(&$arr){
    $len = count($arr);
    //初始化堆，将数组转变为大顶堆
    for($i = (int)($len/2 - 1);$i >= 0;$i--){
        heapify($arr,$len,$i);  
    }

    //从最末元素开始，依次和最首元素进行交换
    for($i = $len-1;$i >= 0;$i--){
        $tmp = $arr[0];
        $arr[0] = $arr[$i];
        $arr[$i] = $tmp;

        heapify($arr,$i,0);
    }
}
// 以为 $i 根结点，将 $arr 数组进行堆化处理，$n为数组长度
function heapify(&$arr,$n,$i) {
    $root = $i;
    $left = 2*$i + 1;//左结点
    $right = 2*$i + 2;//右结点
    if($left < $n && $arr[$left] > $arr[$root]){//如果左子结点大于根结点，则将左子结点变为根结点
        $root = $left;
    }
    if($right < $n && $arr[$right] > $arr[$root]){//如果右子结点大于根结点，则将右子结点变为根结点
        $root = $right;
    }
    if($root != $i){//如果root发生了变化，则表示root进行过转换，需要递归调用直到堆无变化
        $tmp = $arr[$i];
        $arr[$i] = $arr[$root];
        $arr[$root] = $tmp;

        heapify($arr,$n,$root);//递归调用
    }
}

$arr = [1,3,5,2,4];
heap_sort($arr);
var_dump($arr);