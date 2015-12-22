<?php
namespace dac;

echo 'WorkingSubClass' . PHP_EOL;

class WorkingSubClass extends BaseClass {

	public function __construct(){
		require_once DEPENDENCY_DIR . '/Dependency.php';
	}

}