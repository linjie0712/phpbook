<?php
$epsilon = 1e-10;//精度为10的-10次方
$a = 0.3;
$b = 0.1+0.2;
//不使用精度
var_dump($a - $b == 0);//bool(false)
//使用精度
var_dump(abs($a - $b) <= $epsilon);//bool(true)