<?php
$a = 1;    // $a         -> zval_1(type=IS_LONG, value=1, refcount=1)
$b = $a;   // $a, $b     -> zval_1(type=IS_LONG, value=1, refcount=2)
$c = $b;   // $a, $b, $c -> zval_1(type=IS_LONG, value=1, refcount=3)

// 写分离
$a += 1;   // $b, $c -> zval_1(type=IS_LONG, value=1, refcount=2)
           // $a     -> zval_2(type=IS_LONG, value=2, refcount=1)

unset($b); // $c -> zval_1(type=IS_LONG, value=1, refcount=1)
           // $a -> zval_2(type=IS_LONG, value=2, refcount=1)

unset($c); // 因为refcount=0，所以 zval_1 被释放
           // $a -> zval_2(type=IS_LONG, value=2, refcount=1)