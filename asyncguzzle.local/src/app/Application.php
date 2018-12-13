<?php

namespace me\adamcameron\asyncguzzle\app;

use me\adamcameron\asyncguzzle\provider;
use Psr\Log\LogLevel;
use Silex\Application as SilexApplication;
use Silex\Provider\MonologServiceProvider;
use Symfony\Component\Debug\ErrorHandler;
use Symfony\Component\Debug\ExceptionHandler;
use Symfony\Component\HttpKernel\Log\Logger;

class Application extends SilexApplication {

	public function __construct(array $values = []){
		parent::__construct($values);

		ErrorHandler::register();
		ExceptionHandler::register();

		$this->registerProviders();
	}

	public function registerProviders(){
		$this->register(new provider\RouteProvider());
        $this->register(
            new MonologServiceProvider(),
            [
                'monolog.logfile' => __DIR__ . '/../../log/general.log',
                'monolog.level'   => LogLevel::DEBUG,
                'monolog.name'    => 'asyncguzzle',
            ]
        );
		$this->register(new provider\ControllerProvider());
	}
}
