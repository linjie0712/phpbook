<?php
$neddle = 'hello';
$haystack = 'hello world';

//方法1: strpos
$has_found = strpos($haystack,$neddle) !== false;
echo $has_found.PHP_EOL;

//方法2: strstr
$has_found = strstr($haystack,$neddle) !== false;
echo $has_found.PHP_EOL;