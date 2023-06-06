<?php
function autoload_big_animal($class){
	$filename = './big_animal/'.strtolower($class).'.php';
	if(file_exists($filename)) require_once $filename;
}
function autoload_small_animal($class){
	$filename = './small_animal/'.strtolower($class).'.php';
	if(file_exists($filename)) require_once $filename;
}

spl_autoload_register('autoload_big_animal');
spl_autoload_register('autoload_small_animal',true);

$tom = new Cat();
$tom->eat();
echo PHP_EOL;

$emily = new Elephant();
$emily->eat();
echo PHP_EOL;
/*
Output
cat eat fish
elephant eat grass
*/