<?php
$animals = array ("dog",array ("pig", "cat"));
//等同于 echo (count($animals, 0));echo (count($animals, COUNT_NORMAL));
echo (count($animals)).PHP_EOL;

echo (count($animals, 1)).PHP_EOL;//等同于 echo (count($animals, COUNT_RECURSIVE));

$animals2 = array("dog", "pig", "cat", array("horse", array("monkey")) );
echo count($animals2, 1).PHP_EOL;