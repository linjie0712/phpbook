<?php
class Node{
	public $key = '';
	public $weight = '';
	public $left = null;
	public $right = null;

	public function __construct($key,$weight,$left,$right){
		$this->key = $key;
		$this->weight = $weight;
		$this->left = $left;
		$this->right = $right;
	}
}
class HaffmanTree{

	private $words = [];

	public function __construct($text){
		$words = count_chars($text,1);
		foreach ($words as $ascii => $count) {
			$words[chr($ascii)]  = $count;
			unset($words[$ascii]);
		}
		$this->words = $words;
	}

	public function build(){
		$nodes = [];
		foreach ($this->words as $word => $count) {
			$nodes[]  = new Node($word,$count,null,null);
		}

		$compareWeightFunc = function ($node1,$node2){
			if($node1->weight == $node2->weight){
				return 0;
			}
			return $node1->weight > $node2->weight ? 1 : -1;
		};

		$size = count($nodes);
		for ($i=0; $i !== $size -1; $i++) { 
			uasort($nodes,$compareWeightFunc);
			$node1 = array_shift($nodes);
			$node2 = array_shift($nodes);
			$nodes[] = new Node(null,$node1->weight+$node2->weight,$node1,$node2);
		}
		$root = reset($nodes);
		$codes = [];
		$this->buildCodes($root, '', $codes);
		return $codes;
	}

	private function buildCodes($node, $code = '', &$codes) {
		  if (null !== $node->key) {
		    $codes[$node->key] = $code;
		  } else {
		    $this->buildCodes($node->left, $code.'0', $codes);
		    $this->buildCodes($node->right, $code.'1', $codes);
		  }
	}

}

$text = 'AACBCAADDBBADDAABB';
$tree = new HaffmanTree($text);
$codes = $tree->build();

var_dump($codes);