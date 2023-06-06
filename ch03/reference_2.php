<?php
$a = 1;
$b = & $a;
unset($a);
var_dump($b);
//output 1