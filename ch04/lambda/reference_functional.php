<?php
$nums = [1,2];
$nums = array_map(function ($num) {
    return $num + 1;
}, $nums);

//do something else
foreach($nums as $num){
	echo $num."\t";
}
echo PHP_EOL;
//output 2 3
var_dump($nums);//$nums = [2,3]