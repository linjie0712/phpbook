<?php
$str1 = 'noon';$str2 = 'nono';
$is_same = count_chars($str1, 1) === count_chars($str2, 1);
var_dump($is_same);