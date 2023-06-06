<?php
var_dump(0.3 == 3e-1);//bool(true)
var_dump(0.3 == 0.1 + 0.2);//bool(false)
var_dump(1100.80 * 100 == 110080);//bool(true)
var_dump(1100.85 * 100 == 110085);//bool(false)

var_dump(0.3 - (0.1+0.2));
//Output float(-5.5511151231258E-17)