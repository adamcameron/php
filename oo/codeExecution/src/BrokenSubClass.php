<?php
namespace dac;

echo __FILE__ . ' read' . PHP_EOL;

require_once DEPENDENCY_DIR . '/Dependency.php';

class BrokenSubClass extends BaseClass {

	public function __construct(){
        echo __FILE__ . ' constructor executed' . PHP_EOL;
	}

}
