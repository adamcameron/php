<?php

namespace doctrineTest\provider\service;

use doctrineTest\repository\ColourRepository;
use doctrineTest\repository\NumberRepository;
use Pimple\Container;
use Pimple\ServiceProviderInterface;

class RepositoryProvider implements ServiceProviderInterface {

	public function register(Container $pimple) {
		$pimple["repository.number"] = function($pimple) {
			$numberRepository = new NumberRepository(
				$pimple["factory.connection"],
				$pimple["helper.parameter"]
			);

			return $numberRepository;
		};

		$pimple["repository.colour"] = function($pimple) {
			$colourRepository = new ColourRepository(
				$pimple["service.entityManager"]
			);

			return $colourRepository;
		};
	}
}
