<?php
$s = 'ababcdab';
echo lengthOfLongestSubstring($s);
//计算最长无重复子序列的长度
function lengthOfLongestSubstring($s) {
    $maxLength = 0;//记录最长无重复子序列的长度
    $left = -1;//记录窗口的最左位置
    $s_len = strlen($s);//记录 $s 的长度
    $hash = [];//记录字符及其位置
    for($i=0;$i<$s_len;$i++){
        if(isset($hash[$s[$i]]) && $hash[$s[$i]] > $left){//判断字符是否在窗口中
            $left = $hash[$s[$i]];//将最左位置设置为当前字符上次出现时的位置
        }
        $hash[$s[$i]] = $i;//将当前位置及字符记录到hash表里
        $maxLength = max($maxLength,$i-$left);//最长长度应该是记录的长度与窗口长度两者之间的较大值
    }
    return $maxLength;
}