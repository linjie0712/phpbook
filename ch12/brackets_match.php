<?php
$str = '{[(1+2)*2]*3}';
var_dump(brackets_match($str));
function brackets_match($str){
	$stack = [];
	$left = ['{','[','('];//存放左括号
	$right = ['}',']',')'];//存放右括号
	for ($i=0; $i < strlen($str); $i++) { //对字符串的每个字符进行遍历
		if(in_array($str[$i],$left)){//如果当前字符属于左括号，只需入栈，不进行判断
			array_push($stack,$str[$i]);
		}else if(in_array($str[$i], $right)){//如果当前字符属于右括号，需要判断
			$pre = array_pop($stack);//取出最后一个入栈的字符

			// 使用 array_search 函数查找匹配的字符
			// $positon = array_search($str[$i], $right);//找出右括号的坐标
			// $expected = $left[$positon];//找出对应的左括号
			
			// 使用 switch 来对比遇到的字符
			switch ($str[$i]) {
				case '}':
					$expected = '{';
					break;
				case ']':
					$expected = '[';
					break;
				case ')':
					$expected = '(';
					break;
				default:
					$expected = '';
					break;
			}
			if($pre != $expected) return false;
		}		
	}
	return empty($stack) ? true : false;
}