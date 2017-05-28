<?php
namespace me\adamcameron\silex2\provider;

use Pimple\Container;
use Pimple\ServiceProviderInterface;
use Igorw\Silex\ConfigServiceProvider;

class ConfigProvider implements ServiceProviderInterface
{
    public function register(Container $container)
    {
		$env = getenv('deployment_environment') ?: 'prod';
		$env = strtolower($env);
        $configFile = realpath(__DIR__ . "/../../config/config.$env.json");

        $container->register(new ConfigServiceProvider($configFile));
    }
}
