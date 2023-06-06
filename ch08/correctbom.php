<?php
$bom_file = './file_with_bom.txt';
$corrected_file = './file_corrected.txt';

$ret = check_bom($bom_file);
var_dump($ret);
//Output: true

correct_bom($bom_file,$corrected_file);

$ret = check_bom($corrected_file);
var_dump($ret);
//Output: false

//检查文件是否包含bom头
function check_bom($filename){
	$bomchars = "efbbbf";//bom头
	$head = read_hex($filename,3);//取前3个字符
	return $head == $bomchars;//与bom头对比
}

//以十六进制读取文件内容
function read_hex($filename,$len){
	$handle = fopen($filename, "rb");//以二进制只读方式打开文件
	$contents = fread($handle, $len);	//读取len个字符
	$head = strval(bin2hex($contents));//将二进制转换为十六进制
	fclose($handle);//文件使用完毕，关闭之
	return $head;
}

//写入文件
function fwrite_stream($fp, $string) {
    for ($written = 0; $written < strlen($string); $written += $fwrite) {
        $fwrite = fwrite($fp, substr($string, $written));
        if ($fwrite === false) {
            return $written;
        }
    }
    return $written;
}

//过滤掉bom头
function trim_utf8_bom($data){ 
    if(substr($data, 0, 3) == pack('CCC', 0xEF, 0xBB, 0xBF)) {//如果包含bom头，则去掉前3个字符
        return substr($data, 3);
    }
    return $data;//如果不包含bom头，则原样返回
}

//修正带bom头的文件
function correct_bom($bom_file,$new_file){
	$bomchars = read_hex($bom_file,filesize($bom_file));//读取bom文件
	$handle = fopen($new_file, "wb");//以二进制可写方式打开文件，用于保存过滤后的数据
	$bin =  pack("H" . strlen($bomchars), $bomchars);//压缩为十六进制
	$bin = trim_utf8_bom($bin);//过滤掉bom头
	fwrite_stream($handle,$bin);//写入文件
	fclose($handle);//关闭文件
}