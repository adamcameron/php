<?php
namespace dac;

echo __FILE__ . ' outside class definition' . PHP_EOL;

class WontCompileClass {

	echo __FILE__ . ' outside class definition' . PHP_EOL;

	public function __construct(){
        echo __FILE__ . ' constructor executed' . PHP_EOL;
	}

}
