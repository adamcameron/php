<?php

namespace me\adamcameron\general\db\provider;

use me\adamcameron\general\db\model\DbConfig;
use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ConfigProvider implements ServiceProviderInterface
{

    public function register(Container $pimple)
    {
        $pimple['config.db'] = function () {
            $dbConfigDir = self::getDefaultConfigDirectory();
            $dbConfigFile = $dbConfigDir . '/db.json';
            return self::getDbConfigFromFile($dbConfigFile);
        };
    }

    public static function getDbConfigFromFile($file)
    {
        $raw = file_get_contents($file);
        $config = json_decode($raw);

        return new DbConfig($config);
    }

    public static function getDefaultConfigDirectory()
    {
        return realpath(__DIR__ . '/../../config/');
    }
}
