<?php
$source = __FILE__;//源文件
$hard_link = 'hard_link';//硬连接
$soft_link = 'sort_link';//软连接
unlink($hard_link);//为重复执行，先删掉原有连接
unlink($soft_link);//为重复执行，先删掉原有连接
link($source,$hard_link);//生成硬连接
echo "hard link filesize: ".filesize($hard_link).PHP_EOL;//输出硬连接的文件大小
$stat = lstat($hard_link);//获取硬连接的信息
echo "hard link linksize: ".$stat['size'].PHP_EOL;//输出硬连接占用空间大小
symlink($source, $soft_link);//生成软连接
echo "soft link filesize: ".filesize($soft_link).PHP_EOL;//输出软连接的文件大小
$stat = lstat($soft_link);//获取软连接的信息
echo "soft link linksize: ".$stat['size'].PHP_EOL;//输出软连接占用空间大小