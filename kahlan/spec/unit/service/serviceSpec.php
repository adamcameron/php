<?php

use Kahlan\Plugin\Double;
use me\adamcameron\kahlan\service\Dependency;
use me\adamcameron\kahlan\service\Service;

describe('mocked tests', function () {
	given('dependency', function () {
		$dependency = Double::instance([
			'extends' => Dependency::class
		]);

		allow($dependency)->toReceive('isImplicitVoidMethod');
		allow($dependency)->toReceive('isExplicitVoidMethod');

		return $dependency;
	});

	given('service', function () {
		return new Service($this->dependency);
	});

	it ('does like implicit void methods', function () {
		expect($this->dependency)
			->toReceive('isImplicitVoidMethod')
			->once();

		$this->service->callImplicitVoidMethod();
	});

	it ('does not like type-checked void methods', function () {
		expect($this->dependency)
			->toReceive('isExplicitVoidMethod')
			->once();

		$this->service->callExplicitVoidMethod();
	});
});
