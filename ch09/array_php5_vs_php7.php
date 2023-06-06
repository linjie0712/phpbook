<?php
$startUsage = memory_get_usage();
$startTime = microtime(true);
$array = range(0, 100000);
$usedMemory = (memory_get_usage() - $startUsage)/(1024*1024);
$usedTime = (microtime(true) - $startTime)*1000;
printf("Memory: %.2f MB,Time: %.1f ms\n",$usedMemory,$usedTime);