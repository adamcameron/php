<?php

namespace me\adamcameron\kahlan\provider;

use me\adamcameron\kahlan\config\Config;
use Pimple\Container;
use Pimple\ServiceProviderInterface;

/** @codeCoverageIgnore */
class ConfigProvider implements ServiceProviderInterface
{
    public function register(Container $container)
    {
        $container['service.config'] = function () {
            return new Config();
        };
    }
}
