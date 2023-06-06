<?php
function gen_demo() {
    yield 1;  
    yield 2;
    yield 3;
}

$generator = gen_demo();
foreach ($generator as $value) {
    echo "$value\n";
}