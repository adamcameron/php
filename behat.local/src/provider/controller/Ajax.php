<?php
// Ajax.php
namespace me\adamcameron\behattest\provider\controller;

use Silex;
use Silex\ControllerProviderInterface;

class Ajax implements ControllerProviderInterface {

	public function connect(Silex\Application $app){
		$controllers = $app['controllers_factory'];

		$controllers->get('', 'controller.ajax:doGet')
			->method('GET')
			->bind('route.ajax.main');
		return $controllers;
	}

}
