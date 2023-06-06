<?php
//手机号正则


//网址


//邮箱


//身份证号
$str = '350321096003237001
350321963237001';
$isMatched = preg_match_all('/\d{17}[\dXx]|\d{15}/m', $str, $matches);
var_dump($isMatched, $matches);