<?php

namespace me\adamcameron\kahlan\provider;

use Doctrine\DBAL\DriverManager;
use me\adamcameron\kahlan\dao\BookingDAO;
use me\adamcameron\kahlan\dao\CustomerDAO;
use me\adamcameron\kahlan\dao\JobDAO;
use Pimple\Container;
use Pimple\ServiceProviderInterface;

/** @codeCoverageIgnore */
class DatabaseProvider implements ServiceProviderInterface
{
    public function register(Container $container)
    {
        $this->registerConnections($container);
        $this->registerDAOs($container);
    }

    public function registerDAOs($container)
    {
        $container['dao.booking'] = function ($container) {
            return new BookingDAO($container['connection.booking']);
        };

        $container['dao.customer'] = function ($container) {
            return new CustomerDAO($container['connection.customer']);
        };

        $container['dao.job'] = function ($container) {
            return new JobDAO($container['connection.job']);
        };
    }

    private function registerConnections($container)
    {
        $container['connection.general'] = function ($container) {
            $dbConfig = $container['service.config']->database;
            return DriverManager::getConnection([
                'driver' => 'pdo_mysql',
                'host' => $dbConfig->host,
                'port' => $dbConfig->port,
                'dbname' => $dbConfig->database,
                'user' => $dbConfig->username,
                'password' =>$dbConfig->password
            ]);
        };


        $container['connection.booking'] = function ($container) {
            return $container['connection.general'];
        };
        $container['connection.customer'] = function ($container) {
            return $container['connection.general'];
        };
        $container['connection.job'] = function ($container) {
            return $container['connection.general'];
        };
    }
}
