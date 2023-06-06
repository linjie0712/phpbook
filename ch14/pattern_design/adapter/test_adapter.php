<?php
//处理类的自动加载
spl_autoload_register(function ($class_name) {
	$class_name = strtolower($class_name);
    require_once $class_name . '.php';
});

$chinaTV = new ChinaTV();
$chinaTV->plugPower();

$japanTV = new JapanTV();
$tv = new ChinaTVAdapter($japanTV);
$tv->plugPower();