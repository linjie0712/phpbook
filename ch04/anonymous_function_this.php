<?php
class Test
{
	private $name = 'world';
    public function who()
    {
        return function() {
            var_dump($this->name);
        };
    }
}

$object = new Test;
$function = $object->who();
$function();