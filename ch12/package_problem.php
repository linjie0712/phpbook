<?php
//01背包问题
class Package{
	//物品数量
	private $amount = 0;
	//空间大小
	private $room = 0;
	//所有物品的属性
	private $items = [];
	//存放所有可能结果
	private $c = [];

	public function __construct($amount,$room,$items){
		$this->amount = $amount;
		$this->room = $room;
		$this->items = $items;
	}

	//计算所有可能的方案，并返回最大的收益
	public function maxValue(){
		//当不取任何物品时，收益为0
		for($i=0;$i<=$this->room;$i++){
			$this->c[0][$i] = 0;
		}
		for($i = 1;$i<=$this->amount;$i++){
			for($j = 1;$j<= $this->room;$j++){
				//选择物品i之后的收益
				$weightSeletI = $this->items[$i-1]['value'] + $this->c[$i][$j-$this->items[$i-1]['weight']];
				//不选择物品i之后的收益
				$weightNotSelectI = $this->c[$i-1][$j];
				//如果背包还能装得下，并且选择物品i之后的收益更大，则选择之；反之，不选择物品i
				if($this->items[$i-1]['weight'] <= $j && $weightSeletI > $weightNotSelectI) {
					$this->c[$i][$j] = $weightSeletI;
				} else {
					$this->c[$i][$j] = $weightNotSelectI;
				}
			}
		}	
		//返回最大收益	
		return $this->c[$this->amount][$this->room];
	}

	//选择最优方案
	public function bestChoice(){
		//最终选择的物品
		$selected = [];
		//剩余的空间
		$remainSpace = $this->room;
		for($i=$this->amount;$i>=1;$i--){
			if($remainSpace >= $this->items[$i-1]['weight']){//检查剩余空间能否装下第 i 个物品
				if($this->c[$i][$remainSpace] - $this->c[$i-1][$remainSpace-$this->items[$i-1]['weight']] == $this->items[$i-1]['value']){//检查装了哪个物品才能达到最大收益
					$selected[] = $this->items[$i-1];//选择第 i 个物品（注意下标从 0 开始）
					$remainSpace = $remainSpace - $this->items[$i-1]['weight'];//选择第 i 个物品，那么剩余空间将减去第 i 个物品的重量
				}
			}
		}
		return $selected;
	}
	
	//打印出所有的可能选择，用于调试
	public function printAllChoice(){
		for($i = 1;$i<= $this->amount;$i++){
			for($j =1;$j<= $this->room;$j++ ){
				echo $this->c[$i][$j].' ';
			}
			echo PHP_EOL;
		}
	}
}

$items = [
	[
		'name'=>'a',//物品名称标识
		'value'=>1,//物品的价值
		'weight'=>2//物品的重量
	],
	[
		'name'=>'b',
		'value'=>3,
		'weight'=>3
	],
	[
		'name'=>'c',
		'value'=>5,
		'weight'=>4
	],
	[
		'name'=>'d',
		'value'=>9,
		'weight'=>7
	],
	[
		'name'=>'e',
		'value'=>6,
		'weight'=>5
	],
];
$package = new Package(5,10,$items);
$totalValue = $package->maxValue();
echo "Best Value is : ".$totalValue.PHP_EOL;
echo "The Plan is as following: \n";
$selected = $package->bestChoice();
foreach ($selected as $item) {
	echo "item ".$item['name']." is selected\n";
}
//$package->printAllChoice();