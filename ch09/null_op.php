<?php
$a = ''; //试着将 $a 换成 0、false、NULL
$b = $a ?? 'a';  
$c = $a ?: 'a'; 
var_dump($b,$c);//$a = '',$c = 'a'