<?php
function fibonacci($n){
	$a = 0;//第1个数
	$b = 1;//第2个数
	if($n >= 1){//当n>=1时，输出第1个数
		yield $a;
	}
	if($n >= 2){//当n>=2时，输出第2个数
		yield $b;
	}
	for ($i = 3; $i <= $n; $i++) { //当n>=3时，每一项都是前两个数之和
		$c = $a + $b;
		yield $c;
		$a = $b;
		$b = $c;
	} 
}
foreach (fibonacci(10) as $value) {
	echo $value,"\n";
}