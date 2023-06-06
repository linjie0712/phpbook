<?php
//相同键名合并
$arr1 = ['a'=>'b'];
$arr2 = ['a'=>'c'];
var_dump(array_merge($arr1,$arr2));//后者覆盖前者，结果为 ['a'=>'c']
var_dump($arr1 + $arr2);//前者保留，后者舍弃 ['a'=>'b']

//数字键值重新编号
$arr1 = [1=>'a',3=>'c'];
$arr2 = [2=>'b',4=>'d'];
var_dump(array_merge($arr1,$arr2));//重新编号，结果为 [0=>'a',1=>'c',2=>'b',3=>'d']
var_dump($arr1 + $arr2);//保留原键名，不会重新编号，结果为 [1=>'a',3=>'c',2=>'b',4=>'d']