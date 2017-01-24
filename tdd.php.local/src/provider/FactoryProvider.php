<?php

namespace me\adamcameron\tdd\provider;

use me\adamcameron\tdd\model\Person;
use Pimple\Container;
use Pimple\ServiceProviderInterface;

class FactoryProvider implements ServiceProviderInterface
{
    public function register(Container $container)
    {
        $container['factory.person'] = $container->protect(
            function ($id, $firstName) {
                return new Person($id, $firstName);
            }
        );
    }
}
