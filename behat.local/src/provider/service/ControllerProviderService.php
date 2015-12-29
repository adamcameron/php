<?php
// ControllerProviderService.php
namespace me\adamcameron\behattest\provider\service;

use me\adamcameron\behattest\provider\controller\AjaxControllerProvider;
use me\adamcameron\behattest\provider\controller\HomeControllerProvider;
use Silex;

class ControllerProviderService extends BaseService {

	public function register(Silex\Application $app) {
		$app["provider.controller.home"] = $app->share(function() {
			return new HomeControllerProvider();
		});
		$app["provider.controller.ajax"] = $app->share(function() {
			return new AjaxControllerProvider();
		});
	}

}
