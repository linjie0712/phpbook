<?php
/*
$redis = new Redis();
$redis->connect('127.0.0.1', 6379);
$v = $redis->get('checklog_1906');
$v = unpack('H*', $v);//按16进制解析,$v = 478820;
$v = base_convert($v[1], 16, 2);//将16进制转换为2进制
*/
$v = '10001111000100000100000';
echo find_longest_seq($v);

//找到最长子序列，$str 为二进制字符串。
function find_longest_seq($str){
	$len = strlen($str);
	$max = $cur = 0;
	for($i = 0;$i<$len;$i++){
		if('1' == $str[$i]){
			$cur++;
		}else{
			$max = max($cur,$max);
			$cur = 0;
		}
	}
	return max($max,$cur);
}