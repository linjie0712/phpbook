<?php
$startUsage = memory_get_usage();

$array = range(100000, 0,-1);
$usedMemory = (memory_get_usage() - $startUsage)/(1024*1024);
echo $array[0];
printf("Memory: %.2f MB\n",$usedMemory);