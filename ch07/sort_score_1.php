<?php
$reports = [
	['name'=>'tom','score'=>90],
	['name'=>'xiaoming','score'=>70],
	['name'=>'xiaohong','score'=>80],
	['name'=>'david','score'=>100],
];
//比较函数，将分数大的放前面
function cmp($a, $b){
//    if ($a['score'] == $b['score']) {//如果分数相等，返回0
//        return 0;
//    }
//    return ($a['score'] > $b['score']) ? -1 : 1;//如果$a 比 $b 分数大，返回 -1；反之返回 1

    return $b['score'] <=> $a['score']; //太空船运算符
}
usort($reports, "cmp");
var_dump($reports);