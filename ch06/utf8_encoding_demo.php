<?php
$str = "好";
for ( $pos=0; $pos < strlen($str); $pos ++ ) {
 $byte = substr($str, $pos);
 echo 'Byte ' . $pos . ' of $str has value ' . decbin(ord($byte)) . PHP_EOL;
 echo 'Byte ' . $pos . ' of $str has value ' . ord($byte) . PHP_EOL;
}