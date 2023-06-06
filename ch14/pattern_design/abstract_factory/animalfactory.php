<?php
class AnimalFactory{
    //创建dog类
    public function createDog(){
        return new Dog();
    }
    //创建cat类
    public function createCat(){
        return new Cat();
    }
}