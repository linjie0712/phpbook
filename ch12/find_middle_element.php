<?php
include './link_node.php';

//链表 0->1->2->3->4
$node4 = new LinkNode(4,null);
$node3 = new LinkNode(3,$node4);
$node2 = new LinkNode(2,$node3);
$node1 = new LinkNode(1,$node2);
$root = new LinkNode(0,$node1);

$middle = find_middle_element_1($root);
var_dump($middle->getValue());

//如果链表的长度为奇数，则返回中间元素。如果长度为偶数，返回中间之后的元素。
function find_middle_element_1($linkNode){
    $slow = $linkNode;
    $fast = $linkNode;
    while ($fast != null && $fast->getNext() != null) {  
        $fast = $fast->getNext()->getNext();
        $slow = $slow->getNext();
    }
    return $slow;
}
//如果链表的长度为奇数，则返回中间元素。如果长度为偶数，返回中间之前的元素。
function find_middle_element_2($linkNode){
    $slow = $linkNode;
    $fast = $linkNode;
    while ($fast != null && $fast->getNext() != null) {
        $fast = $fast->getNext()->getNext();
        if(!$fast){
        	break;
        }
        $slow = $slow->getNext();
    }
    return $slow;

}