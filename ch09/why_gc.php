<?php
$a = array( 'one' );
$a[] =& $a;
unset($a);
var_dump($a);