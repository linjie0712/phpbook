<?php
$str = 'hello';//单引号定义字符串
$str2 = "$str world";//双引号定义字符串
$str3 = $str . ' world';//字符串拼接
strtoupper('Hello World');//将字符串转化为大写
strtolower('Hello World');//将字符串转化为小写
/*
$nums = [1,3,2,6,4,5];
sort($nums);//正序排序，结果 1,2,3,4,5,6
var_dump($nums);

rsort($nums);//逆序排序，结果 6,5,4,3,2,1
echo implode(',',$nums);
var_dump($nums);

$array = ['tom','jerry'];
$json = json_encode($array);//将数组转换为json
$array = json_decode($json,true);//将json转换为数组
var_dump($json,$array);


$array_1 = array(1,2,3,4);//新建数组
//新建数组
$array_2 = [
	'name' => 'david',
	'score'=>100
];

//错误处理
//不使用try catch，直接抛出 Fatal Error
//undefined_func();

try{
	undefined_func();
}catch(Error $e){
	var_dump($e->getMessage());
}
//output: Call to undefined function undefined_func()


//函数-引用参数
$str = 'In outer space';
value_demo($str);
echo $str;//In outer space
function value_demo($str){
	$str = 'In function:'.__FUNCTION__;
}

//函数-引用参数
$str = 'In outer space';
reference_demo($str);
echo $str;//In function:reference_demo
function reference_demo(&$str){
	$str = 'In function:'.__FUNCTION__;
}


//函数-可变参数
function my_multiple(...$numbers) {
    $score = 1;
    foreach ($numbers as $n) {
        $score *= $n;
    }
    return $score;
}
echo my_multiple(1, 8, 8, 4);


//类与对象
class MyClass extends BaseClass implements iClass{
	const STATUS = 0;//常量
	private $a;//私有属性
	protected $b;//受保护属性
	public $c;//公有属性

	public function foo(){
		return 'foo';
	}
}


//函数
function my_max(int $arg1,int $arg2 = 0) : int{
	return max($arg1,$arg2);
}
echo my_max(1,3);
echo max(1,2);
echo MAX(1,2);


//命名空间
//namesapce David\Name;
//use Other\Name as OtherName;





//异常处理
try{
	//do something
}catch(Exception $e){
	echo 'Caught exception: ',  $e->getMessage(), "\n";
}finally{
	echo "finally.\n";
}


//条件控制
$a = 4;
switch ($a) {
	case 1:
		echo "$a is equal to 1";
		break;
	case 2:
		echo "$a is equal to 1";
		break;
	default:
		echo "$a is not equal to 1 or 2";
		break;
}


//循环控制 do-while
$i = 0;
do{
	echo "counting {$i}\n";
	$i++;
}while($i <10);


//循环控制 while
$i = 0;
while($i<10){
	echo "counting {$i}\n";
	$i++;
}


//循环控制 foreach
$fruits = ['apple','orange','banana'];
foreach($fruits as $fruit){
	echo "{$fruit} is a kind of fruit\n";
}


//循环控制 for
for($i=0;$i<10;$i++){
	echo "counting {$i}\n";
}


//条件控制
if($a > $b){
	echo 'a is bigger than b';
}elseif($a < $b){
	echo 'a is smaller than b';
}else{
	echo 'a is equal to b';
}


//数组运算符
$a = array(1) + array(2,3);
var_dump($a);

//位运算符
echo 1 | 2;

//变量范围
function foo(){
	global $a;
	$a = 1;
}
foo();
var_dump($a);//$a = 1

*/