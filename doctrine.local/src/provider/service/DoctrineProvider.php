<?php

namespace doctrineTest\provider\service;

use Doctrine\ORM\EntityManager;
use Pimple\Container;
use Pimple\ServiceProviderInterface;

class DoctrineProvider implements ServiceProviderInterface {

	public function register(Container $pimple) {
		$pimple["service.entityManager"] = function($pimple){
			$dbConnectionConfig = (array) $pimple["config.general"]->doctrine->dbConnection;

			$entityManager = EntityManager::create(
				$dbConnectionConfig,
				$pimple["config.doctrine"]
			);

			return $entityManager;
		};
	}
}
