<?php
$str = "hello world";
echo reverse_string($str);
//Output dlrow olleh
function reverse_string($str){
    $ret = '';
    for($i = strlen($str)-1 ; $i >= 0 ; $i--){//从尾到头遍历
        $ret .= $str[$i];//拼接起每个字符
    }
    return $ret;
}