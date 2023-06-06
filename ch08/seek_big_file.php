<?php
$path = './tmp/bigfile.txt';
echo getLastLines($path, 6);
/* Output:
line 9995
line 9996
line 9997
line 9998
line 9999
line 10000
*/
function getLastLines($filename, $number){
    if (!$fp = fopen($filename, 'r')) {//尝试打开文件，如果文件不存在，则返回 false
        return false;
    }
    $pos = -2;//从后向前查找，起始位置为倒数第 2 个字符
    $eof = '';//暂存换行符，以检查指针是否在每一行的结尾
    $str = '';//保存查找结果
    while ($number > 0) {//查找n行
        while ($eof != "\n") {//如果当前字符不是换行符，则继续向前查找
            if (!fseek($fp, $pos, SEEK_END)) {//从结尾开始查找
                $eof = fgetc($fp);//取得当前字符
                $pos--;//位置向前移动
            } else {//如果当前字符是换行符，则退出内循环
                break;
            }
        }
        $str = fgets($fp).$str;//取出一行内容
        $eof = '';//初始化变量
        $number--;//继续向前查找
    }
    return $str;
}