<?php
var_dump(strval(0x10));//Output: "16"
var_dump(strval(010));//Output: "8"
var_dump(strval(10));//Output: "10"
var_dump(strval(10.0));//Output: "10"
var_dump(strval(10.1));//Output: "10.1"
var_dump(strval(1.1e2));//Output: "110"
var_dump(strval(true));//Output: "1"
var_dump(strval(false));//Output: ""
var_dump(strval(NULL));//Output: ""
$file_handle = fopen(__FILE__, 'r');//以只读模式打开本文件
var_dump(strval($file_handle));//Output: "Resource id #5"