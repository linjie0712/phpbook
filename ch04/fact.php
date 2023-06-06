<?php
echo "Factorial of 10 is " .fact(10);  
function fact($n){
	if($n <= 1){
		return 1;
	}
	return $n * fact($n -1);
}