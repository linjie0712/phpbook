<?php
$array = [6,5,4,1,2,3];
echo 'Origin Array : '.implode(',', $array)."\n";
$sorted_array = bubble_sort($array);
echo 'Sorted Array : '.implode(',', $sorted_array)."\n";

function bubble_sort($array){
    for($i = count($array) -1;$i >= 1;$i--){
        $FLAG = FALSE;//FLAG用来记录以下循环中是否发生了交换，没有则代表排序完成
        for($j = 0;$j <= $i-1;$j++){
            if($array[$j] > $array[$j+1]){//若左边的元素大于右边的元素，则交换，FLAG设置为1
                $temp = $array[$j];
                $array[$j] = $array[$j+1];
                $array[$j+1] = $temp;
                $FLAG = TRUE;
            }
        }
        if(FALSE == $FLAG){
            break;
        }
    }
    return $array;
}
?>