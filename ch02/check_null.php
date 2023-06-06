<?php
$a = '';
$b = 0;
$c = null;
var_dump(isset($a));//bool(true)
var_dump(empty($a));//bool(true)
var_dump(isset($b));//bool(true)
var_dump(empty($b));//bool(true)
var_dump(isset($c));//bool(false)
var_dump(empty($c));//bool(true)
var_dump(isset($d));//bool(false)
unset($a);
var_dump(isset($a));//bool(true)