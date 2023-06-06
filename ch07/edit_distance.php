<?php
$str1 = 'the';
$str2 = 'tha';
$str1 = "intention";
$str2 = "execution";
echo levenshtein($str1,$str2).PHP_EOL;
echo edit_distance($str1, $str2).PHP_EOL;

function edit_distance($str1,$str2){
	$str1_len = strlen($str1);
	$str2_len = strlen($str2);
	if(0 == $str1_len){
		return $str2_len;
	}
	if(0 == $str2_len){
		return $str1_len;
	}
	$matrix = [];
	for($i = 0;$i<=$str1_len;$i++){
		$matrix[$i][0] = $i;
	}
	for($i = 0;$i<=$str2_len;$i++){
		$matrix[0][$i] = $i;
	}
	for($i= 1;$i<=$str1_len;$i++){
		for($j = 1;$j<=$str2_len;$j++){
			if($str1[$i-1] == $str2[$j-1]){
				$matrix[$i][$j] = $matrix[$i-1][$j-1];
			}else{
				$matrix[$i][$j] = min($matrix[$i][$j-1]+1,$matrix[$i-1][$j]+1,$matrix[$i-1][$j-1]+1);
			}
		}
	}
	return $matrix[$str1_len][$str2_len];
}