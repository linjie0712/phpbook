<?php
declare(strict_types=1);
function boolJudge(bool ...$args){
	$ret = true;
	foreach ($args as $value) {
		$ret &= $value; 
	}
	return $ret;
}
var_dump(boolJudge(1,1.0,true));//Output: Fatal error: Uncaught TypeError