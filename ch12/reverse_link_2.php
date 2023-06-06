<?php
include './link_node.php';

//链表 0->1->2->3->4
$node4 = new LinkNode(4,null);
$node3 = new LinkNode(3,$node4);
$node2 = new LinkNode(2,$node3);
$node1 = new LinkNode(1,$node2);
$root = new LinkNode(0,$node1);

$reversed = reverse($root);
$reversed->visit();

function reverse($root){
	if(null == $root){
		return $root;
	}
	$curr = $root;
	$pre = null;
	while(null != $curr){
		$tmp = $curr->getNext();
		$curr->setNext($pre);
		$pre = $curr;
		$curr = $tmp;

	}
    return $pre;
}