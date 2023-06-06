<?php
include './phpbook.php';
use function PHPBook\say_hello;//使用命名空间之下的函数
use const PHPBook\HELLO_STRING;//使用命名空间之下的常量
use PHPBook\Demo;//使用命名空间之下的类

//use function PHPBook\say_hello as say_hello;//使用命名空间之下的函数
//use const PHPBook\HELLO_STRING as HELLO_STRING;//使用命名空间之下的常量
//use PHPBook\Demo as Demo;//使用命名空间之下的类

say_hello();
//output:Hello World

echo HELLO_STRING;
//output:Hello World

$demo = new Demo();
$demo->say_hello();
//output:Hello World