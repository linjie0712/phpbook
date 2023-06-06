<?php
//获取文件名
$_GET['path'] = basename($_GET['path']);
// 检查文件是否存在
$file = "/home/dir/{$_GET['path']}";
if (file_exists($file)) {
	$fp = fopen($file, 'r');
}