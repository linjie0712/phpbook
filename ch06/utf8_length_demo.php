<?php
$word = 'a';//英文字符
printf("1 bytes demo: %s, Length %d\n",$word,strlen($word));
$word = 'ā';//拉丁字母
printf("2 bytes demo: %s, Length %d\n",$word,strlen($word));
$word = '好ā';//中文
printf("3 bytes demo: %s, Length %d, chinese length %d\n",$word,strlen($word), mb_strlen($word));
$word = '丽';//CJK
printf("4 bytes demo: %s, Length %d\n",$word,strlen($word));


$str = "好";
for ($i = 0; $i < strlen($str);$i++){
    $byte = substr($str,$i);
    //ord — 转换字符串第一个字节为 0-255 之间的值
    //decbin — 十进制转换为二进制
    //chr — 从数字生成单字节字符串
    //bindec — 二进制转换为十进制
    echo 'Byte ' . $i . ' of $str has value ' . decbin(ord($byte)) . PHP_EOL;
}


