<?php

namespace me\adamcameron\kahlan\spec\acceptance\job;

use Kahlan\Plugin\Double;
use me\adamcameron\kahlan\app\Container;
use me\adamcameron\kahlan\dao\BookingDAO;
use me\adamcameron\kahlan\dao\JobDAO;
use me\adamcameron\kahlan\job\SyncCustomersJob;
use me\adamcameron\kahlan\repository\JobRepository;
use me\adamcameron\kahlan\spec\Helper;

describe('Zero-bookings test', function () {
	given('container', function () {
		$container = new Container();

		$helper = new Helper(__FILE__);
		$testData = $helper->loadTestData();

		$bookingDao = Double::instance([
			'extends' => BookingDAO::class,
			'methods' => ['__construct']
		]);

		allow($bookingDao)
			->toReceive('getBookingsSince')
			->andReturn([]);

		expect($bookingDao)
			->toReceive('getBookingsSince')
			->with($testData->getLastRunForJob);

		$container['dao.booking'] = $bookingDao;

		$jobDao = Double::instance([
			'extends' => JobDAO::class,
			'methods' => ['__construct']
		]);

		allow($jobDao)
			->toReceive('getLastRunForJob')
			->andReturn($testData->getLastRunForJob);

		allow($jobDao)
			->toReceive('setLastRunForJob')
			->andReturn(null);

		expect($jobDao)
			->toReceive('getLastRunForJob')
			->with(JobRepository::SYNC_CUSTOMERS_JOB)
			;

		allow($jobDao)
			->toReceive('setLastRunForJob')
			->andReturn(null);

		expect($jobDao)
			->toReceive('setLastRunForJob')
			->with(JobRepository::SYNC_CUSTOMERS_JOB,$testData->getLastRunForJob)
			;

		$container['dao.job'] = $jobDao;

		return $container;
	});

	it ('does not perform any customer processing', function () {
		$job = new SyncCustomersJob($this->container, ['recordsToProcess' => 5]);
		$job->run();
	});
});