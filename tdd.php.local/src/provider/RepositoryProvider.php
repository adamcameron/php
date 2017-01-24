<?php
namespace me\adamcameron\tdd\provider;

use me\adamcameron\tdd\repository\PersonRepository;
use Pimple\Container;
use Pimple\ServiceProviderInterface;

class RepositoryProvider implements ServiceProviderInterface
{
    public function register(Container $container)
    {
        $container['repository.person'] = function () {
            return new PersonRepository();
        };
    }
}
