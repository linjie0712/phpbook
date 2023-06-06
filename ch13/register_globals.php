<?php 
// 当用户合法的时候，赋值 $is_admin = true 
if (check_admin()) {     
	$is_admin= true; 
}   
/* 由于并没有事先把 $is_admin 初始化为 false， 
当 register_globals 打开时，可能通过GET register_globals.php?is_admin=1 来定义该变量值 。
所以任何人都可以绕过身份验证 
*/
if ($is_admin) {     
	//进入管理后台 
} 
function check_admin(){
	//判断是否为管理员
}