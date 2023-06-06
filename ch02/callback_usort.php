<?php
//定义callback函数，分数大的元素排名靠前
function cmp_score($a,$b){
	if($a['score'] == $b['score']){
		return 0;
	}
	return ($a['score'] > $b['score']) ? -1 : 1;
}

$list = [
	['name'=>'Tom','score'=>80],
	['name'=>'Bob','score'=>60],
	['name'=>'David','score'=>90],
	['name'=>'LiLy','score'=>55],
];

usort($list,'cmp_score');//'cmp_score'作为一个callback类型的参数

foreach ($list as $index => $item) {
	echo "Name: {$item['name']}\tScore: {$item['score']}\tRank: ".($index+1)."\n";
}