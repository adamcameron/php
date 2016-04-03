<?php

namespace me\adamcameron\decorator\provider\service;

use Silex;
use me\adamcameron\decorator\controller;

class ControllerServiceProvider extends BaseServiceProvider {

	public function register(Silex\Application $app) {

		$app["controller.home"] = $app->share(function() {
			return new controller\HomeController();
		});

		$app["controller.multiRoleRepositoryExample"] = $app->share(function() {
			return new controller\MultiRoleRepositoryExampleController();
		});

		$app["controller.nullifiedMultiRoleRepositoryExample"] = $app->share(function() {
			return new controller\NullifiedMultiRoleRepositoryExampleController();
		});

		$app["controller.fullyDecoratedRepositoryExample"] = $app->share(function() {
			return new controller\FullyDecoratedRepositoryExampleController();
		});

		$app["controller.reverseDecoratedRepositoryExample"] = $app->share(function() {
			return new controller\ReverseDecoratedRepositoryExampleController();
		});

		$app["controller.loggerDecoratedRepositoryExample"] = $app->share(function() {
			return new controller\LoggerDecoratedRepositoryExampleController();
		});

		$app["controller.cacheDecoratedRepositoryExample"] = $app->share(function() {
			return new controller\CacheDecoratedRepositoryExampleController();
		});

		$app["controller.inheritanceExample"] = $app->share(function() {
			return new controller\InheritanceExampleController();
		});

	}

}
