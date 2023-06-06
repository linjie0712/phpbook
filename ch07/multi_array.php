<?php
$arr = [
    [
        1 => [11,110],
        2 => [22,220],
        3 => [33,330],
    ],
	[
        4 => [44,440],
        5 => [55,550],
        6 => [66,660],
    ],
	[   
        7 => [77,770],
        8 => [88,880],
        9 => [99,990]
    ],
];
multi_array_visit($arr,function($element){echo $element.',';});
function multi_array_visit($arr,$func){
    foreach($arr as $sub){
        if(is_array($sub)){//元素为数组时，继续遍历
            multi_array_visit($sub,$func);
        }else{//元素不为数组时，说明到达普通元素，可以访问元素了
            $func($sub);
        }
    }
}