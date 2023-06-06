<?php
$str = 'hello world';
echo reverse_string($str);
//Output dlrow olleh
function reverse_string($str){
    $full_len = strlen($str);
    $half_len = $full_len/2;//只需循环长度的一半
    for($i = 0;$i < $half_len;$i++){
    	//以中间位置为中心，交换位置 i 和 full_len-1-i 的值 
        $tmp = $str[$i];
        $str[$i] = $str[$full_len-1-$i];
        $str[$full_len-1-$i] = $tmp;
    }
    return $str;
}