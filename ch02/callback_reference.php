<?php
function demo(&$a){
    $a = 5;
}
$a = 6;
call_user_func_array('demo', array(&$a));
echo $a,"\n";
call_user_func('demo',&$a);
echo $a,"\n";