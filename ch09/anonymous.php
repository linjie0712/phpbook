<?php
interface Animal{//定义动物接口，任何动物的类都要实现sound方法
	public function sound();
}
class Farm{
	private $animal;
	public function feed(Animal $animal){//喂养动物
		$this->animal = $animal;
	}
	public function visit(){//参观农场时，喂养的动物会发出叫声
		$this->animal->sound();
	}
}
$wangFarm = new Farm();//王老先生有块地
$wangFarm->feed(
	new class implements Animal{//地里养奶牛
		public function sound(){
			echo "Moo~Moo~";
		}
	}
);
$wangFarm->visit();// 输出 Moo~Moo~