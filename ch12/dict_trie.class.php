<?php
class TrieNode{
	public $num;//根结点到该结点路径组成的字符串出现的次数
	public $children;//孩子结点
	public $is_end;//是否为叶子结点
	public $value;//结点的值

	public function __construct(){
		$this->num = 1;
		$this->children = [];
		$this->is_end = false;
	}
}

class Trie{
	public $root;
	public function __construct(){
		$this->root = new TrieNode();
	}

	//插入单词，构建字典树
	public function insert($word){
		if(empty($word))return;
		$node = $this->root;
		$len = strlen($word);
		for($i =0;$i<$len; $i++){
			$letter = $word[$i];
			if(null == $node->children[$letter]){
				$new_node=new TrieNode();
				$new_node->value = $letter;
				$node->children[$letter] = $new_node;
			}else{
				$node->children[$letter]->num++;
			}
			$node = $node->children[$letter];
		}
		$node->is_end = true;
	}

	//先序遍历整棵树
	public function pre_order($node){
		if(null != $node){
			echo $node->value,' ';
			foreach ($node->children as $child) {
				$this->pre_order($child);
			}
		}
	}

	//给定特定前缀，返回所有匹配的单词的数目，用于联想单词
	public function count_prefix($prefix){
		if(empty($prefix))return -1;
		$node = $this->root;
		$len= strlen($prefix);
		for($i =0;$i<$len; $i++){
			$letter = $prefix[$i];
			if(null == $node->children[$letter]){
				return 0;
			}else{
				$node = $node->children[$letter];
			}
		}
		return $node->num;
	}

	//给定特定前缀，返回所有匹配的单词，用于联想单词
	public function related_words($prefix){
		if(empty($prefix))return [];
		$node = $this->root;
		$len= strlen($prefix);
		for($i =0;$i<$len; $i++){
			$letter = $prefix[$i];
			if(null == $node->children[$letter]){
				return null;
			}else{
				$node = $node->children[$letter];
			}
		}
		$words = [];
		$this->get_prefix_words($node,$prefix,$words);
		return $words;
	}

	//获取所有不重复的单词
	public function get_distinct_words(){
		$words = [];
		$this->get_prefix_words($this->root,'',$words);
		return $words;
	}

	//获取特定前缀的单词
	public function get_prefix_words($node,$prefix,&$words){
		if(!$node->is_end){
			foreach($node->children as $child){
				$this->get_prefix_words($child,$prefix.$child->value,$words);
			}
			return;
		}
		$words[] = $prefix;
	}

	//某个单词是否存在
	public function exist($str){
		if(empty($str))return false;
		$node = $this->root;
		$len= strlen($str);
		for($i =0;$i<$len; $i++){
			$letter = $str[$i];
			if(null == $node->children[$letter]){
				return false;
			}else{
				$node = $node->children[$letter];
			}
		}
		return $node->is_end;
	}

	//计算特定结点之后的所有不重复单词的数目
	public function count_distinct_words($node,&$count){
		if(null != $node){
			if($node->is_end){
				$count++;
				return;
			}
			foreach ($node->children as $child) {
				$this->count_distinct_words($child,$count);
			}
		}
	}	
}
// $trie = new Trie();
// $trie->insert('abandon');
// $trie->insert('above');
// $trie->insert('and');
// $trie->insert('boy');
// $trie->insert('dog');

// $trie->pre_order($trie->root);
// echo $trie->count_prefix('a');
// $count = 0;
// echo $trie->count_distinct_words($trie->root,$count);
// var_dump($count);
// $trie->related_words('d');
// $words = $trie->display_distinct_words();
// var_dump($words);
// var_dump($trie->exist('abcd'));
