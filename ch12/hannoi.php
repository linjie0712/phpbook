<?php
$N = 3;//盘子的数目
$count = 0;//移动的总次数
hannoi($N,'A','B','C');
echo "Total Move: ",$count,"\n";
//汉诺塔问题，$N 为盘子的个数，将盘子从 $from 移动到 $to，以 $buffer 为辅助
function hannoi($N,$from,$buffer,$to){
	global $count;
	if($N == 0)return;
	hannoi($N-1,$from,$to,$buffer);//先将剩余 N-1 个盘子从 from 移动到 buffer，作为中转
	echo "Move disk {$N} from {$from} to {$to}\n";//再将第 N 个盘子从 from 移动到 to
	$count ++;
	hannoi($N-1,$buffer,$from,$to);//最后将剩余 N-1 个盘子从 buffer 移动到 to
}