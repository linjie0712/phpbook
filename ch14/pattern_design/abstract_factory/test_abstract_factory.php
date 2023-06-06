<?php
require './autoload.php';

$animailFactory = new AnimalFactory();
//创建 dog 实例
$dog = $animailFactory->createDog();
$dog->eat();
//创建 cat 实例
$cat = $animailFactory->createCat();
$cat->eat();