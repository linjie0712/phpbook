<?php
class ChinaTVAdapter implements TV{

	private $tv;
	public function __construct($tv){
		$this->tv = $tv;
	}

	//经电压转换后，可以正常插电启动
	public function plugPower(){
		$this->convert220To110();
		$this->tv->plug110VPower();
	}

	//将 220V 变为 110V 电源
	private function convert220To110(){
		echo "Convert 220V to 110 V\n";
	}
}