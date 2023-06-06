<?php
$path = './tmp/bigfile.txt';
$num = 10000;
for($i=1;$i<=$num;$i++){
	$content = "line {$i}\n";
	file_put_contents($path,$content,FILE_APPEND);
}
echo "done".PHP_EOL;