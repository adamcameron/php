<?php

namespace me\adamcameron\general\db\app;

use me\adamcameron\general\db\provider\ConfigProvider;
use me\adamcameron\general\db\provider\DbProvider;
use Silex\Application as SilexApplication;

class Application extends SilexApplication
{

    public function __construct(array $values = [])
    {
        parent::__construct($values);

        $this->registerProviders();
    }

    private function registerProviders()
    {
        $this->register(new ConfigProvider());
        $this->register(new DbProvider());
    }
}
