<?php
$msg = include 'return.php';//被引用文件有 return 结果
echo $msg.PHP_EOL;//输出 Hello
$msg = include 'noreturn.php';//被引用文件无 return 结果
echo $msg.PHP_EOL;//输出 1
include 'notexist.php';//引用不存在的文件，发出 Warning 