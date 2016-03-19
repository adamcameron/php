<?php
namespace me\adamcameron\decorator\provider\controller;

use Silex;
use Silex\ControllerProviderInterface;

class ControllerProvider implements ControllerProviderInterface {

	public function connect(Silex\Application $app){
		$controllers = $app["controllers_factory"];

		$controllers->get('', "controller.home:doGet")
			->method("GET")
			->bind("route.home");

		$controllers->get("multiRoleRepositoryExample/", "controller.multiRoleRepositoryExample:doGet")
			->method("GET")
			->bind("route.multiRoleRepositoryExample");

		$controllers->get("nullifiedMultiRoleRepositoryExample/", "controller.nullifiedMultiRoleRepositoryExample:doGet")
			->method("GET")
			->bind("route.nullifiedMultiRoleRepositoryExample");

		$controllers->get("fullyDecoratedRepositoryExample/", "controller.fullyDecoratedRepositoryExample:doGet")
			->method("GET")
			->bind("route.fullyDecoratedRepositoryExample");

		$controllers->get("reverseDecoratedRepositoryExample/", "controller.reverseDecoratedRepositoryExample:doGet")
			->method("GET")
			->bind("route.reverseDecoratedRepositoryExample");

		$controllers->get("loggerDecoratedRepositoryExample/", "controller.loggerDecoratedRepositoryExample:doGet")
			->method("GET")
			->bind("route.loggerDecoratedRepositoryExample");

		$controllers->get("cacheDecoratedRepositoryExample/", "controller.cacheDecoratedRepositoryExample:doGet")
			->method("GET")
			->bind("route.cacheDecoratedRepositoryExample");

		return $controllers;
	}

}
