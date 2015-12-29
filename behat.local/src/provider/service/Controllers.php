<?php
// Controllers.php
namespace me\adamcameron\behattest\provider\service;

use Silex;
use me\adamcameron\behattest\controller;

class Controllers extends Base {

	public function register(Silex\Application $app) {
		$app["controller.home"] = $app->share(function() {
			return new controller\Home();
		});
	}

}
