<?php
class LinkNode{
	private $value = null;
	private $next = null;

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