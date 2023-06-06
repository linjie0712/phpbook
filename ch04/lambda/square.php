<?php
$square = function($x){return $x*$x;};
echo $square(5);
//output: 25
echo call_user_func ($square,5);
echo call_user_func_array ($square, array (5));