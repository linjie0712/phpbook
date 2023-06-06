<?php
$path = './tmp/file.txt';
//file 读取方式
$lines = file($path);

//file_get_contents 读取方式
$contents = file_get_contents($path);

//fread 读取方式
$handle = fopen($path, "r");
$contents = fread($handle, filesize ($path));
fclose($handle);

//fgets 读取方式
$liens = [];
$handle = fopen($path, 'r');
while(!feof($handle)){
    $lines[] = fgets($handle, 1024);
}
fclose($handle);