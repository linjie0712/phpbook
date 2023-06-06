<?php
$expression = '25+((2+3)) * 60/3-2+6';
$ES = new EvaluateString();
$result = $ES->evaluate($expression);
var_dump($result);
class EvaluateString{
	private $op_stack = [];//操作符栈
	private $num_stack = [];//操作数栈

	private $ops = [//操作符及其优先级
		'+' => 1,
		'-' => 1,
		'*' => 2,
		'/' => 2,
	];

	//判断 op1 的优先级是否高于 op2
	private function hasHigherPrecedence($op1,$op2){
		if(array_key_exists($op1, $this->ops)){
			$op1_level = $this->ops[$op1];
		}else{
			$op1_level = 0;
		}
		if(array_key_exists($op2, $this->ops)){
			$op2_level = $this->ops[$op2];
		}else{
			$op2_level = 0;
		}
		return $op1_level >= $op2_level;
	}

	//根据 op、num1、num2 计算结果
	private function calcOp($op,$num1,$num2){
		switch ($op) {
			case '+':
				return $num1 + $num2;
			case '-':
				return $num1 - $num2;	
			case '*':
				return $num1 * $num2;
			case '/':
			    if(0 == $num2){
			    	throw new Exception("Cannot Divided By Zero", 1);    	
			    }
				return $num1 / $num2;
			default:
				return 0;
		}
	}

	//计算字符串表达式的值
	public function evaluate($expression){
		$len = strlen($expression);//字符串表达式的长度
		for($i=0;$i<$len;$i++){
			if(' ' == $expression[$i]){
				continue;
			}
			if(is_numeric($expression[$i])){//数字
				$num = '';
				while ($i < $len){//数字可能不止1位，所以要用循环全部取出。
					$num .= $expression[$i];
					if(is_numeric($expression[$i+1])){
						$i++;
					}else{
						break;
					}
				}
				array_push($this->num_stack,$num);
			}else if('(' == $expression[$i]){//左括号直接入操作符栈
				array_push($this->op_stack,$expression[$i]);
			}else if(')' == $expression[$i]){//右括号需要计算括号内的值
				while($this->op_stack && '(' != end($this->op_stack)){
					$this->processCalc();
				}
				array_pop($this->op_stack);//将操作符栈的栈顶左括号出栈
			}else if(array_key_exists($expression[$i],$this->ops)){//操作符
				//如果操作符栈不为空，且栈顶操作符的优先级大于当前操作符，则先计算栈顶的操作符
	            while($this->op_stack && $this->hasHigherPrecedence(end($this->op_stack),$expression[$i])){$this->processCalc();
	            }
            	//将当前操作符入操作符栈
            	array_push($this->op_stack,$expression[$i]);
			}else{
				var_dump($expression[$i]);
				throw new Exception("Unsupported Words", 2);			
			}
		}
		//最后计算栈里剩余的元素
	    while($this->op_stack){ 
	        $this->processCalc();
	    } 
	    //操作数栈的栈顶元素存放着最终结果，返回即可  
	    return end($this->num_stack); 
	}

	//从栈里取出操作符和操作数进行计算
	private function processCalc(){
		$num2 = array_pop($this->num_stack);//取出num2
		$num1 = array_pop($this->num_stack);//取出num1
		$op = array_pop($this->op_stack);//取出op
		$result = $this->calcOp($op,$num1,$num2);//执行计算
		array_push($this->num_stack,$result);//计算结果重新放入操作数栈
	}
}

