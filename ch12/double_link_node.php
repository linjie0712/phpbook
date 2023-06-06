<?php
class DoubleLinkNode{
	private $value = null;
	private $next = null;
	private $prior = null;

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

	public function __construct($value,$next = null,$prior = null){
		$this->value = $value;
		$this->next = $next;
		$this->prior = $prior;
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

	public function setPrior($prior){
		$this->prior = $prior;
	}

	public function getPrior(){
		return $this->prior;
	}
}