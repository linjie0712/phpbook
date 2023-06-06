<?php
echo big_add('9999999999999999','25'),"\n";
echo bcadd('9999999999999999','25'),"\n";
function big_add($num1,$num2){
    $len1 = strlen($num1);//用len1暂存num1的长度
    if(0 == $len1) return $num2; //如果num1的长度为0，则num1为0，和为num2的值 
    $len2  = strlen($num2);//用len2暂存num2的长度
    if(0 == $len2) return $num1;//如果num2的长度为0，则num2为0，和为num1的值
    $len = $len1 > $len2 ? $len1 : $len2;//取出较长的数字长度
    $result = '';//用result存储结果
    $carry_flag = 0;//进位标志
    for($i = $len -1;$i >= 0; $i--){//
        $add1 = $add2 = 0;//保存每个位的加数和被加数
        if($len1 > 0) $add1 = $num1[--$len1];//如果还未取完num1，则取出当前位置的数字，并把游标前移
        if($len2 > 0) $add2 = $num2[--$len2];//如果还未取完num2，则取出当前位置的数字，并把游标前移
        $tmp = $add1 + $add2 + $carry_flag;//每位都是num1和num2同一位置的数字之和加上进位
        if($tmp >= 10){//判断加完之后的和，如果大于等于10，则取余数，并设置进位标志为1
            $result = ($tmp - 10).$result;
            $carry_flag = 1;
        }else{//如果小于10，则取当前值，并设置进位标志为0
            $result = $tmp.$result;;
            $carry_flag = 0;
        }   
    }
    if(1 == $carry_flag){//如果进位标志为1，则最高位为1，需要拼接上
        $result = $carry_flag.$result;
    }
    return $result;
}