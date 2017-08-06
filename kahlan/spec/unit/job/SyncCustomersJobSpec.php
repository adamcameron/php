<?php

namespace me\adamcameron\kahlan\spec\unit\job;

use me\adamcameron\kahlan\app\Container;
use me\adamcameron\kahlan\job\SyncCustomersJob;

describe('Baseline tests', function () {
	given('container', function () {
		return new Container();
	});
	given('baselineArgs', function () {
		return ['recordsToProcess' => 5];
	});
	it ('instantiates OK', function () {
		$job =  new SyncCustomersJob($this->container, $this->baselineArgs);
		expect($job)->toBeAnInstanceOf(SyncCustomersJob::class);
	});
});