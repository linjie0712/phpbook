<?php
class LCS{

	private $X = '';//序列x
	private $lenX = 0;//序列x的长度
	private $Y = '';//序列y
	private $lenY = 0;//序列y的长度
	private $seqs = [];//放置所有的子序列，[lenX+1][lenY+1]，seqs[i][j] 表示 X[0..i-1] 和 Y[0..j-1] 的 LCS 长度

	public function setSeqs($X,$Y){
		$this->X = $X;
		$this->lenX = strlen($X);
		$this->Y = $Y;
		$this->lenY = strlen($Y);
		$this->seqs = [];//重置子序列
	}

	//计算所有的子序列，并返回 $X 和 $Y 的最长公共子序列长度
	public function longestLenth(){
		for ($i = 0; $i <= $this->lenX; $i++)  {  
			for ($j = 0; $j <= $this->lenY; $j++) {  
			    if ($i == 0 || $j == 0){//序列长度为0，则lcs长度为0
			    	$this->seqs[$i][$j] = 0;
			    } else if ($this->X[$i - 1] == $this->Y[$j - 1]){//当前字符相同，则lcs长度加1
			    	$this->seqs[$i][$j] = $this->seqs[$i - 1][$j - 1] + 1; 
			    } else {//当前字符不同，则取前面长度的较大值
			    	$this->seqs[$i][$j] = max($this->seqs[$i - 1][$j], 
			                     $this->seqs[$i][$j - 1]); 
			    } 
			}  
		} 
		return $this->seqs[$this->lenX][$this->lenY];//X[0..lenX-1] 和 Y[0..lenY-1] 的 LCS 长度
	}

	//获取最长公共子序列
	public function longestSeqs(){
		$i = $this->lenX;
		$j = $this->lenY;
		$index = $this->seqs[$this->lenX][$this->lenY];//lcs 的长度
		$lcs = array_fill(0,$index,null);//最长公共子序列
		while($i > 0 && $j > 0){
			if($this->X[$i - 1] == $this->Y[$j - 1]){//如果当前字符相同，则当前字符属于lcs
				$lcs[$index - 1] = $this->X[$i - 1];
				$i--;
				$j--;
				$index--;
			}else if($this->seqs[$i - 1][$j] > $this->seqs[$i][$j - 1]){//如果当前字符不相同，则继续往前找
				$i--;
			}else{
				$j--;
			}
		}
		return $lcs;
	}

	//打印出所有的可能选择，用于调试
	public function printAllChoice(){
		echo '  ',implode(' ', str_split($this->Y)),"\n";
		//var_dump($this->seqs);
		for($i = 1;$i <= count($this->seqs);$i++){
			echo $this->X[$i-1].' ';
			for($j =1;$j<= count($this->seqs[0]);$j++ ){
				echo $this->seqs[$i][$j].' ';
			}
			echo PHP_EOL;
		}
	}
}
$X = 'DABCLEO';
$Y = 'EDCABCF';
$lcs = new LCS();
$lcs->setSeqs($X,$Y);
echo "LCS Length is : ";
echo $lcs->longestLenth();
$longSeqs = $lcs->longestSeqs();
echo "\nLCS Seqs is : ";
echo implode('',$longSeqs);
echo "\n";
$lcs->printAllChoice();