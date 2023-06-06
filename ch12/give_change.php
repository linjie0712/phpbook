<?php
$money = 97;//97分
$ret = give_change($money);
echo "The Best Method for Changing {$money} cents is:\n";
foreach ($ret as $cent => $num) {
	echo "Cent {$cent}, Need {$num}\n";
}
function give_change($money){
	$cents = [50,10,5,2,1];//硬币分为5角、1角、5分、2分、1分。这里要保证从大到小的顺序。
	$ret = [];//存放找零结果
	foreach ($cents as $cent) {//优先使用最大的面额
		while($money >= $cent) { //如果当前余额大于硬币面值，则使用之
			$ret[$cent]++; //记录找零结果
			$money -= $cent;//将余额减去当前硬币面值
			if(0 == $money)break;//如果已经完成，则退出循环
		}
	}
	return $ret;
}