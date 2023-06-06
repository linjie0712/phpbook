<?php
function boolJudge(bool ...$args):float{
	$ret = true;
	foreach ($args as $value) {
		$ret &= $value; 
	}
	return $ret;
}
var_dump(boolJudge(1,1.0,true));//Output: float(1)