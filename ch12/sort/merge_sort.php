 <?php
 //归并排序
 function merge_sort(&$arr){
    $size = count($arr);//$arr 的数组长度
    if(count($arr) < 2){//如果数组中最多只有一个元素，则分隔已完成
        return;
    }
    $middle = (int)($size / 2);//取中点
    $left_size = $middle - 0;//左边部分子数组的长度
    $right_size = $size - $middle;//右边部分子数组的长度
    $left_arr=$right_arr=[];//暂存左边和右边子数组
    
    for($i=0;$i<$left_size;$i++){//取出左边子数组
        $left_arr[$i] = $arr[$i];
    }
    for($j=0;$j<$right_size;$j++){//取出右边子数组
        $right_arr[$j] = $arr[$j+$middle];
    }
    merge_sort($left_arr);//递归调用，分隔左子树
    var_dump('middle',$middle,'left',$left_arr);
    merge_sort($right_arr);//递归调用，分隔右子树
    var_dump('right',$right_arr);
    merge($arr,$left_arr,$left_size,$right_arr,$right_size);//将左右有序数组进行排序
    
 }
 //$arr 存放最终结果的数组；$left_arr 为左边数组；$left_size 为左边数组的长度；$right_arr 为右边数组；$right_size 为右边数组的长度
 function merge(&$arr,$left_arr,$left_size,$right_arr,$right_size){ 	
 	$li = $ri = 0;//$li 用于遍历左边数组；$ri 用于遍历右边数组
 	$i = 0;//$i 为最终结果数组的下标指针
 	while ($li < $left_size && $ri < $right_size) {//将 $left_arr 和 $right_arr 里较小的值放到 $arr 里
 		if($left_arr[$li] <= $right_arr[$ri]){
 			$arr[$i++] = $left_arr[$li++];	
 		}else{
 			$arr[$i++] = $right_arr[$ri++];
 		}
 	}
 	
    while($li < $left_size){//将 $left_arr 剩余元素放到 $arr 里
        $arr[$i++] = $left_arr[$li++];
    }
    while($ri < $right_size){//将 $right_arr 剩余元素放到 $arr 里
        $arr[$i++] = $right_arr[$ri++];
    }
 }
 $arr = [1,3,5,2,4];
merge_sort($arr);
var_dump($arr);
 