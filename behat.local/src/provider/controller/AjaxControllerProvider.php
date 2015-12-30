<?php
// AjaxControllerProvider.php
namespace me\adamcameron\behattest\provider\controller;

use Silex;
use Silex\ControllerProviderInterface;

class AjaxControllerProvider implements ControllerProviderInterface {

	public function connect(Silex\Application $app){
		$controllers = $app['controllers_factory'];

		$controllers->get('', 'controller.ajax:doGet')
			->method('GET')
			->bind('route.ajax.main');

		$controllers->get('sub', 'controller.ajax:doAjaxGet')
			->method('GET')
			->bind('route.ajax.sub');
		return $controllers;
	}

}
