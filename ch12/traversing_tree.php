<?php
class Node{
	public $value;//结点的值
	public $left = null;//左子树
	public $right = null;//右子树

	public function __construct($value){
		$this->value = $value;
	}
}

//先序遍历-非递归方法
function pre_order($root){
	$stack = [];//用栈暂存结点
	if(null == $root){//空树时直接返回
		return;
	}else{
		array_push($stack,$root);//非空树时，将根结点压栈
	}
	while($stack){
		$node = array_pop($stack);//处理根结点
		echo $node->value;
		if(null != $node->right){//最后处理右子树，则先将右子树压栈
			array_push($stack,$node->right);
		}
		if(null != $node->left){//先处理左子树，则后将左子树压栈
			array_push($stack,$node->left);
		}
	}
}

//先序遍历-递归方法
function pre_order_recursive($root){
	if(null != $root){
		echo $root->value;//处理根结点
		if(null != $root->left){//处理左子树
			pre_order_recursive($root->left);
		}
		if(null != $root->right){//处理右子树
			pre_order_recursive($root->right);
		}
	}
}

//中序遍历-非递归方法
function in_order($root){
	$stack = [];//用栈暂存结点
	if(null == $root){//空树时直接返回
		return;
	}else{
		$node = $root;//取根结点作为当前处理结点
	}
	while($stack || null != $node){//栈不为空或当前结点不为空时，循环处理
		while(null != $node){//循环将左子树全部压栈
			array_push($stack,$node);
			$node = $node->left;
		}
		$node = array_pop($stack);//先弹出左孩子，进行处理
		echo $node->value;
		$node = $node->right;//再处理右子树
	}
}

//中序遍历-递归方法
function in_order_recursive($root){
	if(null != $root){
		if(null != $root->left){//处理左子树
			in_order_recursive($root->left);
		}
		echo $root->value;//处理根结点
		if(null != $root->right){//处理右子树
			in_order_recursive($root->right);
		}
	}
}

//后序遍历-非递归方法
function post_order($root){
	$stack = [];//暂存结点的辅助栈
	$ret_stack = [];//暂存最终结果的辅助栈
	if(null == $root){//空树时直接返回
		return;
	}else{
		array_push($stack,$root);//非空树时，将根结点压栈
	}
	while($stack){
		$node = array_pop($stack);
		array_push($ret_stack,$node);//将结点压入最终结果栈
		if(null != $node->left){//处理左子树
			array_push($stack,$node->left);
		}
		if(null != $node->right){//处理右子树
			array_push($stack,$node->right);
		}
	}
	while($ret_stack){//将最终结果栈的数据倒序输出
		$node = array_pop($ret_stack);
		echo $node->value;
	}
}

//后序遍历-递归方法
function post_order_recursive($root){
	if(null != $root){
		if(null != $root->left){//处理左子树
			post_order_recursive($root->left);
		}	
		if(null != $root->right){//处理右子树
			post_order_recursive($root->right);
		}
		echo $root->value;//处理根结点
	}
}

//层序遍历-非递归方法
function level_order($root){
	$queue = [];//暂存结点的辅助队列
	if(null == $root){//空树时直接返回
		return;
	}else{
		array_unshift($queue,$root);//非空树时，将根结点入队列头部
	}
	while($queue){
		$node = array_pop($queue);//将队尾结点弹出
		echo $node->value;
		if($node->left){//将左子树入队列头部
			array_unshift($queue, $node->left);
		}
		if($node->right){//将右子树入队列头部
			array_unshift($queue, $node->right);
		}
	}

}

//层序遍历-递归方法
function level_order_recursive($root){
	$height = get_height($root);//获取树的高度
	if(null == $root || $height < 1){//树为空时直接返回
		return;
	}
	for($i = 1;$i<=$height;$i++){
		print_given_level($root,$i);//打印出各层的数据
	}
}

//获取树的高度
function get_height($root){
	if(null == $root){//空树的高度为0
		return 0;
	}
	if(null == $root->left && null == $root->right){//只有一个结点时，高度为1
		return 1;
	}
	$left_depth = get_height($root->left);//左子树的高度
	$right_depth = get_height($root->right);//右子树的高度
	return max($left_depth,$right_depth) + 1;//树的高度=左右子树的最大高度+1（1为根结点占据的高度）
}

//打印出指定层级的结点
function print_given_level($root,$level){
	if(null == $root){//树为空时直接返回
		return;
	}
	if(1 == $level){//高度为1时，说明没有左右子树，此时输出结点值
		echo $root->value;
	}
	print_given_level($root->left,$level - 1);//处理左子树
	print_given_level($root->right,$level - 1);//处理右子树
}

$a = new Node('A');
$b = new Node('B');
$c = new Node('C');
$d = new Node('D');
$e = new Node('E');

$a->left = $b;
$a->right = $c;
$b->left = $d;
$c->right = $e;

echo '先序遍历，非递归方法'.PHP_EOL;
pre_order($a);
echo PHP_EOL;

echo '先序遍历，递归方法'.PHP_EOL;
pre_order_recursive($a);
echo PHP_EOL;

echo '中序遍历，非递归方法'.PHP_EOL;
in_order($a);
echo PHP_EOL;

echo '中序遍历，递归方法'.PHP_EOL;
in_order_recursive($a);
echo PHP_EOL;

echo '后序遍历，非递归方法'.PHP_EOL;
post_order($a);
echo PHP_EOL;

echo '后序遍历，递归方法'.PHP_EOL;
post_order_recursive($a);
echo PHP_EOL;

echo '层序遍历，非递归方法'.PHP_EOL;
level_order($a);
echo PHP_EOL;

echo '层序遍历，递归方法'.PHP_EOL;
level_order_recursive($a);
echo PHP_EOL;