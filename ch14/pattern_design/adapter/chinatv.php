<?php
class ChinaTV implements TV{
	//我国电视使用 220V 电源
	public function plugPower(){
		echo "China TV use 220V. Start OK.\n";
	}
}