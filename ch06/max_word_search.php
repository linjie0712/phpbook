<?php
$text = 'This is a javascript book not a java book;That is a php book';
$keywords = 'javascript,php';	
$obj = new MaxWordSegmentation($keywords);
$ret = $obj->run($text);
var_dump($ret);

class MaxWordSegmentation{
	private $dict = array();//保存关键词字典 
	function __construct($keywords){
        $this->dict = $this->loadDict($keywords);
	}
	
	//读入关键词到数组里，$keywords为关键词，各个关键词之间用,分隔
	function loadDict($keywords){
        $keywordsArray = explode(',',$keywords);
		$dicts = array();
		foreach($keywordsArray as $keyword){
            $dicts[$keyword] = 1;
        }
        //另外可以用更简洁的写法
        //$dicts = array_combine($keywordsArray,array_fill(0,count($keywordsArray),1));		
		return $dicts;
	}

	//查看词是否在字典中
	function inDict($word){
		return array_key_exists($word,$this->dict);
	}

	//按照词典进行分词。正向最大匹配法
	function run($text,$encode = 'utf-8'){
		$minLen = 0;
		$maxLen = 0;
		//找出最长的单词长度及最短的单词长度
		foreach($this->dict as $key=>$value){
			$iLen = mb_strlen($key,$encode);
			if($minLen > $iLen || $minLen == 0 ){
				$minLen = $iLen;
			}
			if($maxLen < $iLen){
				$maxLen = $iLen;
			}
		}
		$sLen = mb_strlen($text, $encode);
		$result = array();
		for($start = 0;$start < $sLen;$start ++){//外层正文循环	
			for($maxLoop = $maxLen;$maxLoop >= $minLen;$maxLoop --){//内层字典循环
				$word = mb_substr ($text , $start, $maxLoop , $encode);
				//是否匹配成功
				if($this->inDict($word,$this->dict)){//字典查找
					//添加到输出列表
					if(!in_array($word,$result)){
						$result[] = $word;
					}
					break;
				}
			}
			
			
		}
		return $result;
	}
}