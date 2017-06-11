<?php

namespace me\adamcameron\silex2\provider;

use me\adamcameron\silex2\repository\NumberRepository;
use Pimple\Container;
use Pimple\ServiceProviderInterface;

class RepositoryProvider implements ServiceProviderInterface
{
    public function register(Container $pimple)
    {
        $connection = $this->getConnection($pimple['db']);
        $pimple['repository.number'] = new NumberRepository($connection);
    }

    private function getConnection($config)
    {
        $connectionString = sprintf(
            'mysql:host=%s;port=%s;dbname=%s',
            $config['host'],
            $config['port'],
            $config['database']
        );
        return new \PDO(
            $connectionString,
            $config['login'],
            $config['password']
        );
    }
}
