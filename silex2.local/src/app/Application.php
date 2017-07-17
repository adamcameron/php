<?php

namespace me\adamcameron\silex2\app;

use me\adamcameron\silex2\provider\ConfigProvider;
use me\adamcameron\silex2\provider\ControllerProvider;
use me\adamcameron\silex2\provider\RepositoryProvider;
use me\adamcameron\silex2\provider\RouteProvider;
use me\adamcameron\silex2\provider\ServiceProvider;
use Silex\Application as SilexApplication;

class Application extends SilexApplication
{

    public function __construct(array $values)
    {
        parent::__construct($values);

        $this->registerProviders();
    }

    private function registerProviders()
    {
        $this->register(new ConfigProvider());
        $this->register(new RouteProvider());
        $this->register(new ControllerProvider());
        $this->register(new ServiceProvider());
        $this->register(new RepositoryProvider());
    }
}
