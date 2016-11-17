<?php

namespace doctrineTest\provider\controller;

use Silex\Api\ControllerProviderInterface;
use Silex\Application;

class HelloControllerProvider implements ControllerProviderInterface {

	public function connect(Application $app) {
		$controllers = $app["controllers_factory"];

		$controllers->get("/{name}", [$app["controller.hello"], "doGet"])
			->method("GET")
			->bind("route.hello");
		return $controllers;
	}
}
