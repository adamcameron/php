<?php

namespace me\adamcameron\tdd\app;

use me\adamcameron\tdd\provider\FactoryProvider;
use me\adamcameron\tdd\provider\RepositoryProvider;
use Silex\Application;
use me\adamcameron\tdd\provider\ConfigProvider;
use me\adamcameron\tdd\provider\ControllerProvider;
use me\adamcameron\tdd\provider\ServiceProvider;

class TddApplication extends Application
{

    /** @codeCoverageIgnore */
    public function __construct(array $values)
    {
        parent::__construct($values);

        $this->registerProviders();
        $this->loadRoutes();
    }

    /** @codeCoverageIgnore */
    private function registerProviders()
    {
        $this->register(new ConfigProvider());
        $this->register(new ControllerProvider());
        $this->register(new RepositoryProvider());
        $this->register(new FactoryProvider());
        $this->register(new ServiceProvider());
    }

    private function loadRoutes()
    {
        $this['service.route']->loadRoutes($this);
    }
}
