<?php


////10进制转2进制
//echo decbin(10); //1010
//
//echo bindec('1011'); //11
//
////10进制转16进制
//echo dechex(10); //a
////16进制转10进制
//echo hexdec('a'); //10
//
////10进制转8进制
//echo decoct(10); //12
////8进制转10进制
//echo octdec('12'); //10

echo myBaseConvert(10); //1010

function myBaseConvert(int $val, int $tobase = 2): string
{
    $val = intval($val);
    $stack = [];
    while ($val) {
        $stack[] = $val % $tobase;
        $val = intval($val / $tobase);
    }
    $result = "";
    while ($stack) {
        $result .= array_pop($stack);
    }
    return $result;
}

