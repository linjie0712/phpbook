<?php
$items = scan_dir('../');//遍历所有 phpbook 的子目录和文件
var_dump($items);
function scan_dir($dir){
    $files = array();
    if (is_dir($dir)) {
        if ($dh = opendir($dir)) {//打开目录
            while (($file = readdir($dh)) !== false) {//遍历目录
                $dist = $dir . $file;//子文件或子目录
                if (is_dir($dist)) {//如果是目录，则进行递归遍历
                    if ($file != '.' && $file != '..') {//去掉 . 和 ..
                        $files[$file] = scan_dir($dist);//遍历子目录
                    }
                } else {
                    $files[] = $file;//保存子文件
                }
            }
            closedir($dh);//关闭目录
        }
    }
    return $files;
}