<?php

namespace me\adamcameron\db\provider;

use me\adamcameron\db\model\DbConfig;

class ConfigProvider
{

    public static function getDbConfigFromFile($file) : DbConfig
    {
        $raw = file_get_contents($file);
        $config = json_decode($raw);

        return new DbConfig($config);
    }

    public static function getDefaultConfigDirectory() : string
    {
        return realpath(__DIR__ . '/../../config/');
    }
}