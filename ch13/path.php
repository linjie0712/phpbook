<?php
//http://localhost/path.php?path=../../etc/passwd
$fp = fopen("/home/dir/{$_GET['path']}", "r");