<?php
$name = 'world';
// 不使用use
$who = function () {
    var_dump($name);
};
$who();

// 使用use
$who = function () use ($name) {
    var_dump($name);
};
$who();

// 使用global
$who = function () {
    global $name;
    var_dump($name);
};
$who();
/*
Output:
NULL
string(5) "world"
string(5) "world"
*/