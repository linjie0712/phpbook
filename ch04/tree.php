<?php
class Node{
	public $left = null;//左孩子节点，默认为null
	public $right = null;//右孩子节点，默认为null
	public $value;//节点的值

	public function __construct($value){
		$this->value = $value;
	}
}

class BinaryTree{
	public $root = null;//根节点

	public function __construct($node){
		$this->root = $node;
	}

	//中序遍历
	public function inOrder($tree,$callback){
		//处理左子树
		if($tree->left != null){
			$this->inOrder($tree->left,$callback);
		}
		//处理节点的值
		$callback($tree->value);
		//处理右子树
		if($tree->right != null){
			$this->inOrder($tree->right,$callback);
		}
	}
}
//遍历时对节点的值的操作
function inOrderAct($value){
	echo $value.' ';
}
$root = new Node(1);//根节点
$tree = new BinaryTree($root);//二叉树

$left = new Node(3);
$root->left = $left;

$right = new Node(2);
$root->right = $right;
/*
二叉树的结构
  1
/   \
3   2
*/
$tree->inOrder($root,'inOrderAct');
//output 3 1 2