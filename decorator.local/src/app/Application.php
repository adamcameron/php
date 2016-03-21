<?php

namespace me\adamcameron\decorator\app;

use me\adamcameron\decorator\provider\service\ControllerServiceProvider;
use me\adamcameron\decorator\provider\service\ControllerProviderServiceProvider;
use me\adamcameron\decorator\provider\service\RepositoryProvider;
use me\adamcameron\decorator\provider\service\ServiceProvider;
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
        $this->register(new RepositoryProvider());
    }

    function mountControllers() {
        $this->mount("/", $this["provider.controller"]);
    }

}
