<?php
//没有 s 修饰符时，匹配到的字符不包括换行符
$text = "Hello\nWorld";
$pattern = '/.*?/';
print_match_result($text, $pattern);


//s 点号元字符匹配所有字符，包含换行符
$text = "Hello\nWorld";
$pattern = '/.*?/s';
print_match_result($text, $pattern);
//i 大小写不敏感
$text = 'Hello';
$pattern = '/hello/i';
print_match_result($text, $pattern);

//m 多行匹配
$text = 'hello
hello';
$pattern = '/hello/m';
print_match_result($text, $pattern);

//子组demo
$text = 'abab';
$pattern = '/(ab)\1/';//\0表示原始字符串，\1表示第一个子组匹配的内容
print_match_result($text, $pattern);


//变量名
$text = '$var_name';//$中文变量
$pattern = '/^\$[a-zA-Z_\x7f-\xff][a-zA-Z0-9_\x7f-\xff]*/';
print_match_result($text, $pattern);

//手机号匹配 13、18开头的手机号
$text = '13000000000';//18800000000    15600000000
$pattern = '/^1[38]\d{9}$/';
print_match_result($text, $pattern);

//匹配身份证号
$text = '350321096003237001';
$pattern = '/\d{17}[0-9Xx]/';
print_match_result($text, $pattern);

//匹配URL链接
$text = 'http://www.weixinbook.net';//https://www.weixinbook.net/demo/
$pattern = '/http[s]*:\/\/\w[\w.\/]+/';
print_match_result($text, $pattern);

//匹配邮箱
$text = 'abc@mail.com';//ab.c@mail.com.cn   10000@qq.com
$pattern = '/\w[-\w.+]*@\w[-\w.+]+\w{2,14}/';
print_match_result($text, $pattern);

//匹配中文汉字
$text = '都是汉字';//not chinese words
$pattern = '/[\x{4e00}-\x{9fa5}]+/u';
print_match_result($text, $pattern);

//匹配 HTML 标签
$text = "<script>alert('xss')</script>这是一个xss攻击";//
//$text = "<img src='demo.jpg' />";
$pattern = '/^<([a-z]+)([^<]+)*(?:>(.*)<\/\1>|\s+\/>)/';
print_match_result($text, $pattern);

//$text 为需要检测的字符串，$pattern 为正则表达式
function print_match_result($text, $pattern){
	$isMatched = preg_match_all($pattern, $text, $matches);
	var_dump($isMatched, $matches);
}