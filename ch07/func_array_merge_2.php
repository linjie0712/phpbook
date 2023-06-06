<?php
$array1 = ['animal'=>'cat', 2 => 'pig'];
$array2 = ['animal'=>'dog', 2 =>'monkey'];
$array = array_merge($array1,$array2);
print_r($array);