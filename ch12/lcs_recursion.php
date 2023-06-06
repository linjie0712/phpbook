<?php
//最长公共子序列的递归解法
function lcs_recursion($X, $Y, $lenX, $lenY) {  
    if($lenX == 0 || $lenY == 0) {//长度为0时，最长公共子序列的长度为0
    	return 0;
    } else if ($X[$lenX - 1] == $Y[$lenY - 1]){//当前字符相等时，最长公共子序列的长度加1
    	return 1 + lcs_recursion($X, $Y, $lenX - 1, $lenY - 1); 
    } else {//当前字符不相等时，最长公共子序列的长度取较大值
    	return max(lcs_recursion($X, $Y, $lenX, $lenY - 1),  
                   lcs_recursion($X, $Y, $lenX - 1, $lenY)); 
    }       
} 
$X = 'DABCLEO';
$Y = 'EDCABCF';
echo "LCS Length is : ";
echo lcs_recursion($X,$Y,strlen($X),strlen($Y));