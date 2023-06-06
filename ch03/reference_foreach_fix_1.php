<?php
$nums = [1,2];
foreach($nums as $index=>$num){
	$nums[$index] += 1;
}
var_dump($nums);//$nums = [2,3]
//do something else
foreach($nums as $num){
	echo $num."\t";
}
echo PHP_EOL;
//output 2 3
var_dump($nums);//$nums = [2,3]