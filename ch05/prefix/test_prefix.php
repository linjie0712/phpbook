<?php
namespace PHPBook;
include './foo/demo.php';
include './foo/bar/demo.php';

class Demo{
	public function say_hello(){
		echo "Hello World In ".__NAMESPACE__.'\Demo'.PHP_EOL;
	}
}

$demo1 = new Demo();//无前缀，解析为“当前命名空间+类名”，为 PHPBook\Demo 类
$demo1->say_hello();
//output:Hello World In PHPBook\Demo

$demo2 = new Foo\Demo();//有前缀，解析为“当前命名空间+子命名空间+类名”，为 PHPBook\Foo\Demo 类
$demo2->say_hello();
//output:Hello World In PHPBook\Foo\Demo

$demo3 = new \PHPBook\Foo\Bar\Demo();//完整路径，无需解析，为 \PHPBook\Foo\Bar\Demo 类
$demo3->say_hello();
//output:Hello World In PHPBook\Foo\Bar\Demo