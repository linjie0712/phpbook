<?php
$array1 = $array2 = array('1.jpg','12.jpg','3.jpg');
asort($array1);
echo "Standard Sort\n";
print_r($array1);
natsort($array2);
echo "\nNatural Sort\n";
print_r($array2);