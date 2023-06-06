<?php
function xrange($start, $limit, $step = 1) {
    if ($start < $limit) {
        if ($step <= 0) {
            throw new LogicException('Step must be positive number (>0)');
        }

        for ($i = $start; $i <= $limit; $i += $step) {
            yield $i;
        }
    } else {
        if ($step >= 0) {
            throw new LogicException('Step must be negative number (<0)');
        }

        for ($i = $start; $i >= $limit; $i -= $step) {
            yield $i;
        }
    }
}
foreach(xrange(1,5000) as $item){
	//eat
}
echo memory_get_usage();
//采用range方案
/*
$array = range(1,5000);
foreach($array as $item){
	//eat
}
echo memory_get_usage();
*/