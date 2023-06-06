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
    $file = new SplFileObject($filename);
    $file->seek(PHP_INT_MAX);//移动到结尾
    $line_num = $file->key();//结尾的key即为文件行数
    $str = '';
    while ($number > 0) {
        $file->seek($line_num - $number);
        $str .= $file->current();
        $number--;
    }
    return $str;
}