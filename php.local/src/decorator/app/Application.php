<?php

namespace me\adamcameron\decorator\app;

use me\adamcameron\decorator\provider\service\ControllerServiceProvider;
use me\adamcameron\misc\provider\service\ControllerProviderServiceProvider;
use Silex;
use Silex\Application as SilexApplication;


class Application extends SilexApplication {

    function __construct(){
        parent::__construct();
        $this['debug'] = true;
        $this->registerProviders();
        $this->mountControllers();
    }

    function registerProviders(){
        $this->register(new Silex\Provider\ServiceControllerServiceProvider());
        $this->register(new ControllerProviderServiceProvider());
        $this->register(new ControllerServiceProvider());
    }

    function mountControllers(){
        $this->mount('/', $this["provider.controller.home"]);
    }

}
