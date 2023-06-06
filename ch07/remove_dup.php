<?php
$nums = [0,0,1,1,1,2,2,3,3,4];
remove_dup_check_change($nums);
var_dump($nums);
$nums = [1,1,1,2,2];
remove_dup_fast_slow($nums);
var_dump($nums);
function remove_dup_check_change(&$nums) {
    if(empty($nums))return 0;
    $tmp = null;
    foreach($nums as $i=>$num){
        if($num !== $tmp){//当元素与tmp不一致时，说明到达变化点，即将进入下一组
            $tmp = $num;
        }else if($num === $tmp){//当元素与tmp一致时，说明仍在同一组
            unset($nums[$i]);
        }
    }
    return count($nums);
}

function remove_dup_fast_slow(&$nums) {
    if(empty($nums))return 0;
    $len = count($nums);
    for($slow = 0;$slow < $len;){
        $fast = $slow + 1;
        while(isset($nums[$fast]) && $nums[$fast] === $nums[$slow]){//快指针与慢指针指向元素相同，依次删除快指针指向元素
            unset($nums[$fast]);
            $fast ++;
        }
        $slow = $fast;    
    }
    return count($nums);
}