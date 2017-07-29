<?php

namespace me\adamcameron\general\silexApp\app;

use me\adamcameron\general\silexApp\provider\ControllerProvider;
use me\adamcameron\general\silexApp\provider\ServiceProvider;
use Silex\Application;

class SilexApp extends Application
{
    public function __construct(array $values)
    {
        parent::__construct($values);

        $this->registerProviders();
        $this->loadRoutes();
    }

    private function registerProviders()
    {
        $this->register(new ControllerProvider());
        $this->register(new ServiceProvider());
    }

    private function loadRoutes()
    {
        $this['service.route']->loadRoutes($this);
    }
}
