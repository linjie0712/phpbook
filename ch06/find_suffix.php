<?php
$url = 'http://demo.php/a/b/c.png';
//方法1: 使用位置查找
echo substr($url,strrpos($url,'.')+1).PHP_EOL;
//方法2: 按 . 分割为数组，取最后一个元素
echo end(explode('.', $url)).PHP_EOL;