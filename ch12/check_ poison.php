<?php
$bottleNum = 100;
$miceNum = getMiceNum($bottleNum);
echo "Needed Mice Num is At Least ",$miceNum,"\n";

//获取小白鼠的数目
function getMiceNum($bottleNum){
	$miceNum = 0;
	while(true == solution($bottleNum,$miceNum));
	return $miceNum;
}

//处理逻辑：
//当没有瓶子时，不需要再分治；
//当有 1 或 2 个瓶子时，需要 1 个白鼠就够了。随便喝 1 个瓶子的液体，死亡就是毒药，没死就无毒药
//当有 3 个或以上瓶子时，需要进行分治。
//返回false，表示不需要再分治；返回true，表示需要再分治。
function  solution(&$bottleNum,&$miceNum){
	if($bottleNum <= 0){
		return false;
	}else if ($bottleNum <= 2){
		$miceNum ++;
		return false;
	}else{
		$bottleNum = $bottleNum / 2;
		$miceNum ++;
		return true;
	}
}
