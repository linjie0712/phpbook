<?php
echo ord('a').PHP_EOL;//输出97
echo chr(97).PHP_EOL;//输出a
echo removeDupStringByBitMap('aab').PHP_EOL;
//echo removeDupStringByArray('banana').PHP_EOL;

//使用 bitmap 方式实现，复杂度为O(1)
function removeDupStringByBitMap($str){
	$counter = 0;//计数器
	$length = 0;//记录最终字符串的长度
	$str_len = strlen($str);
	for($i=0;$i<$str_len;$i++){
		$x = ord($str[$i]) - ord('a');//计算字符对应于字母 a 的 ASCII 码偏移量
        print_r($x."\n");
		if(($counter & (1 << $x)) == 0){//判断第 x 位是否已设置
			$str[$length] = chr(ord('a') + $x);//将第一次出现的字符串保留
			$counter = $counter | (1 << $x);//将计数器的第x位设置为1
			$length++;//记录最终字符串的有效长度
		}
        print_r($str."\n");
	}
	return substr($str, 0,$length);//由于最终字符串的有效长度为 $length，所以取 0 至 $length 之间的字符串作为返回值
}

//使用数组时间，复杂度为O(N)
function removeDupStringByArray($str){
	$selected = [];//记录第一次出现的字符串
	$str_len = strlen($str);
	for($i=0;$i<$str_len;$i++){
		if(!in_array($str[$i],$selected)){//判断字符是否第一次出现
			$selected[] = $str[$i];//将第一次出现的字符串保留
		}
	}
	return implode('',$selected);//将有效字符连接起来作为返回值
}