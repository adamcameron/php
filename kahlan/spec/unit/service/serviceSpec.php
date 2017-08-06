<?php

namespace me\adamcameron\kahlan\spec\unit\service;

use Kahlan\Plugin\Double;
use me\adamcameron\kahlan\service\Dependency;
use me\adamcameron\kahlan\service\Service;

xdescribe('actual test', function () {
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
			->toReceive('firstTestMethod1')
			->andReturn($this->intermediaryValue);

		allow($dependency)
			->toReceive('firstTestMethod2')
			->andReturn($this->expectedResult);

		allow($dependency)
			->toReceive('secondTestMethod1');

		allow($dependency)
			->toReceive('thirdTestMethod1');

		return $dependency;
	});

	given('service', function () {
		return new Service($this->dependency);
	});

	it ('successfully mocks methods', function () {
		expect($this->dependency)
			->toReceive('firstTestMethod1')
			->with($this->testValue);

		expect($this->dependency)
			->toReceive('firstTestMethod2')
			->with($this->intermediaryValue);

		$result = $this->service->firstTest($this->testValue);

		expect($result)->toBe($this->expectedResult);
	});

	it ('does not like type-checked void methods', function () {
		expect($this->dependency)
			->toReceive('secondTestMethod1')
			->with($this->testValue);

		$result = $this->service->secondTest($this->testValue);

		expect($result)->toBeNull();
	});

	it ('does like implicit void methods', function () {
		expect($this->dependency)
			->toReceive('thirdTestMethod1')
			->with($this->testValue);

		$result = $this->service->thirdTest($this->testValue);

		expect($result)->toBeNull();
	});
});