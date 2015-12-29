<?php
// ControllerService.php
namespace me\adamcameron\behattest\provider\service;

use Silex;
use me\adamcameron\behattest\controller;

class ControllerService extends BaseService {

	public function register(Silex\Application $app) {
		$app["controller.home"] = $app->share(function() {
			return new controller\HomeController();
		});
		$app["controller.ajax"] = $app->share(function() {
			return new controller\AjaxController();
		});
	}

}
