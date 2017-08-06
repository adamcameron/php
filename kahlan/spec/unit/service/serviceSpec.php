<?php

namespace me\adamcameron\kahlan\spec\unit\service;

use Kahlan\Plugin\Double;
use me\adamcameron\kahlan\service\Dependency;
use me\adamcameron\kahlan\service\Service;

describe('actual test', function () {
	given('service', function () {
		return new Service(new Dependency());
	});
	it ('returns the expected result', function () {
		$testValue = 'TEST_VALUE';
		$expectedResult = "second: first: $testValue";
		$result = $this->service->main($testValue);

		expect($result)->toBe($expectedResult);
	});
});

describe('mocked tests', function () {
	given('testValue', function () {
		return 'TEST_VALUE';
	});
	given('intermediaryValue', function () {
		return 'MOCKED_FIRST_RESULT';
	});
	given('expectedResult', function () {
		return 'EXPECTED_RESULT';
	});
	given('dependency', function () {
		$dependency = Double::instance([
			'extends' => Dependency::class
		]);

		allow($dependency)
			->toReceive('first')
			->andReturn($this->intermediaryValue);

		allow($dependency)
			->toReceive('second')
			->andReturn($this->expectedResult);

		return $dependency;
	});

	given('service', function () {
		return new Service($this->dependency);
	});

	it ('actually mocks the damned methods', function () {
		expect($this->dependency)
			->toReceive('first')
			->with($this->testValue);

		expect($this->dependency)
			->toReceive('second')
			->with($this->intermediaryValue);


		$result = $this->service->main($this->testValue);

		expect($result)->toBe($this->expectedResult);
	});
});