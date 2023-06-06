<?php
$nums = [1,2];
foreach($nums as &$num){
	$num += 1;
}
var_dump($nums);//$nums = [2,3]
//do something else
foreach($nums as $num2){
	echo $num2."\t";
}
echo PHP_EOL;
//output 2 3
var_dump($nums);//$nums = [2,3]