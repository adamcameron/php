<?php

namespace me\adamcameron\general\pimple\service;

class ConfigService
{
    public static $defaultValue = 'DEFAULT_VALUE';

    private $values;

    public function __construct()
    {
        $this->values = (object) [
            'key1' => self::$defaultValue
        ];
    }
}
