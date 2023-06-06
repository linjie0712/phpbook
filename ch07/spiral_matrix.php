<?php
$arr = [
	[1,2,3],
	[4,5,6],
	[7,8,9],
];
/*
$arr = [
	[1,2,3,4],
	[5,6,7,8],
	[9,10,11,12],
	[13,14,15,16]
];
*/
$ret = spiral_order($arr);
echo implode(',',$ret).PHP_EOL;
function spiral_order($arr){
	$spiral = [];//存放最终数组
	$left = 0;//左边界，每遍历完，其值+1
	$right = count($arr) - 1;//右边界，每遍历完，其值-1
	$top = 0;//上边界，每遍历完，其值+1
	$bottom = count($arr[0]) - 1;//下边界，每遍历完，其值-1
	$col = 0;//横轴
	$row = 0;//纵轴

	while (true) {
		//遍历上边，从左向右
		for($col = $left;$col<=$right;$col++){
			$spiral[] = $arr[$top][$col];
		}
		if(++$top > $bottom)break;//相当于上边的数据从矩阵里消去
		//遍历右边
		for($row = $top;$row<=$bottom;$row++){
			$spiral[] = $arr[$row][$right];
		}
		if(--$right < $left)break;//相当于右边的数据从矩阵里消去
		//遍历下边
		for($col = $right;$col>=$left;$col--){
			$spiral[] = $arr[$bottom][$col];
		}
		if(--$bottom < $top)break;//相当于下边的数据从矩阵里消去
		//遍历左边
		for($row = $bottom;$row>=$top;$row--){
			$spiral[] = $arr[$row][$left];
		}
		if(++$left > $right)break;//相当于左边的数据从矩阵里消去
	}
	return $spiral;
}