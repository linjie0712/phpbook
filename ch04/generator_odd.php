<?php
function gen_odd($n) {
    $start = 1;
    for($i=0;$i<$n;$i++){
    	yield $start;
    	$start += 2;
    }
}
foreach(gen_odd(4) as $item){
	var_dump($item);
}
//Output 1 3 5 7