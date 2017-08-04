<?php

namespace me\adamcameron\general\db\model;

class DbConfig
{

    public $master;
    public $slave;

    public function __construct($configValues)
    {
        $this->master = $configValues->master;
        $this->slave = $configValues->slave;
    }
}
