<?php
// ControllerProviders.php
namespace me\adamcameron\behattest\provider\service;

use Silex;
use me\adamcameron\behattest\provider\controller;

class ControllerProviders extends Base {

	public function register(Silex\Application $app) {
		$app["provider.controller.home"] = $app->share(function() {
			return new controller\Home();
		});
		$app["provider.controller.ajax"] = $app->share(function() {
			return new controller\Ajax();
		});
	}

}
