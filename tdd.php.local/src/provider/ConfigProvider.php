<?php
namespace me\adamcameron\tdd\provider;

use Pimple\Container;
use Pimple\ServiceProviderInterface;
use Igorw\Silex\ConfigServiceProvider;

class ConfigProvider implements ServiceProviderInterface
{
    public function register(Container $container)
    {
        $env = $this->getDeploymentEnvironment();
        $configFile = realpath(__DIR__ . "/../../config/config.$env.json");

        $container->register(new ConfigServiceProvider($configFile));
    }

    private function getDeploymentEnvironment()
    {
        $env = getenv('deployment_environment') ?: 'prod';
        return strtolower($env);
    }
}
