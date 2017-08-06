<?php

namespace me\adamcameron\kahlan\provider;


use me\adamcameron\kahlan\dao\BookingDAO;
use me\adamcameron\kahlan\repository\BookingRepository;
use me\adamcameron\kahlan\repository\CustomerRepository;
use me\adamcameron\kahlan\repository\JobRepository;
use Pimple\Container;
use Pimple\ServiceProviderInterface;

/** @codeCoverageIgnore */
class RepositoryProvider implements ServiceProviderInterface
{

    public function register(Container $container)
    {
        $container['repository.booking'] = function ($container) {
			return new BookingRepository($container['dao.booking']);
        };

        $container['repository.customer'] = function ($container) {
            return new CustomerRepository($container['dao.customer']);
        };

        $container['repository.job'] = function ($container) {
            return new JobRepository($container['dao.job']);
        };
    }
}
