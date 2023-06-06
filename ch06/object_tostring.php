<?php
class StrA {
    function __toString(){
        return 'called in echo a A object';
    }
}
$a = new StrA();
echo $a;
// Output: called in echo a A object