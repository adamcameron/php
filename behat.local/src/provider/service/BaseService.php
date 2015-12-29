<?php
// BaseService.php
namespace me\adamcameron\behattest\provider\service;

use Silex\ServiceProviderInterface;
use Silex;

abstract class BaseService implements ServiceProviderInterface {

	public function register(Silex\Application $app){
		parent::register($app);
	}

	public function boot(Silex\Application $app){
		// nop
	}

}
