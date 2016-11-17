<?php

namespace doctrineTest\provider\service;

use doctrineTest\provider\controller;
use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ControllerProviderProvider implements ServiceProviderInterface {

	public function register(Container $pimple) {
		$pimple["controllerProvider.hello"] = function() {
			return new controller\HelloControllerProvider();
		};
		$pimple["controllerProvider.pdo"] = function() {
			return new controller\PdoControllerProvider();
		};
		$pimple["controllerProvider.colour"] = function() {
			return new controller\ColourControllerProvider();
		};
	}
}
