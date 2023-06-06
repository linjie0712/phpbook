<?php
class Node {
	public $id = 0;//结点ID
	public $children = null;//孩子结点ID
	public $name = '';//结点名称


	public insert($trie,$id,$name){
		$node = new Node();
	}
}

class District{
	
}

$districts = [
	['id'=>0,'parent_id'=>-1,'name'=>'全国'],
	['id'=>1,'parent_id'=>0,'name'=>'北京'],
	['id'=>2,'parent_id'=>0,'name'=>'河北'],
	['id'=>3,'parent_id'=>1,'name'=>'海淀'],
	['id'=>4,'parent_id'=>1,'name'=>'东城'],
	['id'=>0,'parent_id'=>1,'name'=>'西城'],
	['id'=>0,'parent_id'=>1,'name'=>'朝阳'],
	['id'=>0,'parent_id'=>2,'name'=>'石家庄'],
];