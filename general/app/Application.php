<?php
namespace me\adamcameron\decorator\app;

class Application extends \Silex\Application {

	function __construct(){
		parent::__construct();
		$this['debug'] = true;
		$this->registerProviders();
		$this->mountControllers();
	}

	function registerProviders(){
		$this->register(new Silex\Provider\ServiceControllerServiceProvider());
		$this->register(new Silex\Provider\TwigServiceProvider(), [
			"twig.path" => __DIR__ . '\..\views',
			"twig.options" => ['cache' => __DIR__ . '\..\..\cache']
		]);
		$this->register(new provider\service\Controllers());
		$this->register(new provider\service\ControllerProviders());
	}

	function mountControllers(){
		$this->mount('/', $this["provider.controller.home"]);
	}

}
