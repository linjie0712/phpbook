<?php
//斐波那契数列的递归解法
function fibonacci_recursion($n){
	if($n <= 0){
		return 0;
	}else if($n == 1){
		return 1;
	}else{
		return fibonacci_recursion($n - 1) + fibonacci_recursion($n - 2);
	}
}
//斐波那契数列的动态规划解法
function fibonacci_dynamic($n){
	$records[0] = 0;
	$records[1] = 1;
	if($n > 1){
		for($i = 2;$i<=$n;$i++){
			$records[$i] = $records[$i-1] + $records[$i-2];
		}

	}
	return $records[$n];
}
$n = 9;
echo fibonacci_recursion($n);
echo fibonacci_dynamic($n);