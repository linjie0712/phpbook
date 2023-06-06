<?php
$key = 'a';
debug_zval_dump($key);
$array = [
	$key => 0
];
$b = $key;
debug_zval_dump($key);
