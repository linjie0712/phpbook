<?php
$a = "1234\0X";
$b = "1234\0XY";
printf("%d\n", strcmp($a,$b)); //输出-1
printf("%d\n", strlen($b));//输出7