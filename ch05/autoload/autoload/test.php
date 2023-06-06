<?php
function __autoload($class){
	$filename = './'.strtolower($class).'.php';
	if(file_exists($filename)) require_once $filename;
}

$tom = new Cat();
$tom->eat();
echo PHP_EOL;

$tiantian = new Dog();
$tiantian->eat();
echo PHP_EOL;
/*
Output
cat eat fish
dog eat bone
*/