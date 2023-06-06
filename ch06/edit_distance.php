<?php
$str1 = 'the';
$str2 = 'tha';
echo levenshtein($str1,$str2).PHP_EOL;
echo edit_distance_1($str1, $str2).PHP_EOL;
//计算两个字符串的编辑距离是否为 1
function edit_distance_1($str1, $str2)
{
	if($str1 == $str2){//如果两个字符串相等，返回值为 0
		return 0;
	}
    $alphalet = "abcdefghijklmnopqrstuvwxyz";//字母表
    $all = [];//存放所有可能的转换结果
    //lambda1 定义了如何处理插入和替换的lambda表达式
    $lambda1 = function ($callback) use ($str1, $alphalet) {
        $ret = [];
        $str1_len = strlen($str1);
        $alphalet_len = strlen($alphalet);
        for ($i = 0; $i < $str1_len; $i++) {
            for ($j = 0; $j < $alphalet_len; $j++) {
                $ret[] = $callback($i, $j, $str1, $alphalet);
            }
        }
        return $ret;
    };
	//lambda2 定义了如何处理删除和改变位置的lambda表达式
    $lambda2 = function ($callback) use ($str1) {
        $ret = [];
        $str1_len = strlen($str1);
        for ($i = 0; $i < $str1_len; $i++) {
            $ret[] = $callback($i, $str1);
        }
        return $ret;
    };

    //插入 1 个字符
    $inserts = $lambda1(
        function ($i, $j, $str1, $alphalet) {
            return substr($str1, 0, $i) . $alphalet[$j] . substr($str1, $i);
        });
	$all = array_merge($all,$inserts);

    //替换 1 个字符
    $replaces = $lambda1(
        function ($i, $j, $str1, $alphalet) {
        	$str1 = substr_replace($str1,$alphalet[$j],$i,1);
            //$str1[$i] = $alphalet[$j];//也可以使用元素替换
            return $str1;
        }); 
    $all = array_merge($all,$replaces);

    //删除 1 个字符
    $deletes = $lambda2(
        function ($i, $str1) {
            return substr($str1, 0, $i) . substr($str1, $i + 1);
        });
	$all = array_merge($all,$deletes);
    
    //改变位置
    $changes = $lambda2(
        function ($i, $str1) {
            return substr($str1, 0, $i) . substr($str1, $i + 1, 1) . substr($str1, $i, 1) . substr($str1, $i + 2);
        });
    $all = array_merge($all,$changes);

    if(in_array($str2, $all)){
    	return 1;
    }else{
    	return false;
    }
}