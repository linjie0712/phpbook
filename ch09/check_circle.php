<?php
class LinkNode{
	private $value = null;
	private $next = null;
	
	//检查是否有环
	public function checkCircle(){
		$fast = $slow = null;
		if(null != $this->getNext()){
			$slow = $this->getNext();
		}
		if(null != $this->getNext()->getNext()){
			$fast = $this->getNext()->getNext();
		}
		do{
			//比较慢指针与快指针的值，判断是否存在环
			if($fast->getValue() === $slow->getValue()){
				return true;
			}
			$slow = $slow->getNext();//慢指针每次向前走 1 步	
			if(null != $fast->getNext()){//快指针每次向前走 2 步
				$fast = $fast->getNext()->getNext();
			}else{
				$fast = null;
			}
			
		}while (null !== $fast && null !== $slow);
		return false;
	}

	//遍历链表
	public function visit(){
		if(isset($this->value)){
			echo $this->value.PHP_EOL;
		}else{
			return;
		}
		if(isset($this->next)){
			$this->next->visit();
		}
	}

	public function __construct($value,$next = null){
		$this->value = $value;
		$this->next = $next;
	}

	public function setValue($value){
		$this->value = $value;
	}

	public function getValue(){
		return $this->value;
	}

	public function setNext($next){
		$this->next = $next;
	}

	public function getNext(){
		return $this->next;
	}
}

//测试有环 0->1->2->3->1
//生成节点
$root = new LinkNode(0,null);
$node1 = new LinkNode(1,null);
$node2 = new LinkNode(2,null);
$node3 = new LinkNode(3,null);
//设置节点的关系
$root->setNext($node1);
$node1->setNext($node2);
$node2->setNext($node3);
$node3->setNext($node1);

$hasCircle = $root->checkCircle();
var_dump($hasCircle);
//$root->visit(); 有环情况下请勿执行visit，会死循环
/*
//测试无环 0->1->2->3->4
$root = new LinkNode(0,null);
$node1 = new LinkNode(1,null);
$node2 = new LinkNode(2,null);
$node3 = new LinkNode(3,null);
$node4 = new LinkNode(4,null);
$root->setNext($node1);
$node1->setNext($node2);
$node2->setNext($node3);
$node3->setNext($node4);

$hasCircle = $root->checkCircle();
var_dump($hasCircle);
$root->visit();
*/