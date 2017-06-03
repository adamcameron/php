<?php

namespace me\adamcameron\db\provider;

use me\adamcameron\db\model\DbConfig;
use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ConfigProvider implements ServiceProviderInterface
{

    public function register(Container $pimple)
    {
        $pimple['config.db'] = function() {
            $dbConfigDir = self::getDefaultConfigDirectory();
            $dbConfigFile = $dbConfigDir . '/db.json';
            return self::getDbConfigFromFile($dbConfigFile);
        };
    }

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