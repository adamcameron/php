<?php

namespace me\adamcameron\pimpleBug\app;

use me\adamcameron\pimpleBug\provider\service\ControllerServiceProvider;
use me\adamcameron\pimpleBug\provider\service\ControllerProviderServiceProvider;
use me\adamcameron\pimpleBug\provider\service\ServiceProvider;
use Silex;
use Silex\Application as SilexApplication;


class Application extends SilexApplication {

    function __construct() {
        parent::__construct();
        $this["debug"] = true;
        $this->registerProviders();
        $this->mountControllers();
    }

    function registerProviders() {
        $this->register(new Silex\Provider\ServiceControllerServiceProvider());
        $this->register(new ControllerProviderServiceProvider());
        $this->register(new ControllerServiceProvider());
        $this->register(new ServiceProvider());
    }

    function mountControllers() {
        $this->mount("/", $this["provider.controller"]);
    }

}
