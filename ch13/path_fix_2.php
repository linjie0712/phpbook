<?php
// 将所有可用文件设置白名单
$white_list = array();
foreach(glob("downloads/*.txt") as $v) {
        $white_list[md5($v)] = $v;
} 
if (isset($white_list[$_GET['path']]))
        $fp = fopen($white_list[$_GET['path']], "r");

//http://localhost/path_fix_2.php?path=c4ca4238a0b923820dcc509a6f75849b