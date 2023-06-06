<?php
//大小写敏感
define('A', 'a', true);
echo A; // a
echo A; // a
const B = 'b';
echo B;//b
echo b;//错误：常量未定义

//命名规则
for ($i = 0; $i < 10; ++$i) {
    define('NUMBER_' . $i, $i);
}
/*
以下语句语法错误
for ($i = 0; $i < 10; ++$i) {
    const 'NUMBER_' . $i = $i;
}
*/