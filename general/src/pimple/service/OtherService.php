<?php

namespace me\adamcameron\general\pimple\service;

class OtherService
{
    private $config;

    public function __construct(ConfigService $config)
    {
        $this->config = $config;
    }
}
