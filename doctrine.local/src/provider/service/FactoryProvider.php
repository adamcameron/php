<?php

namespace doctrineTest\provider\service;

use doctrineTest\factory\ConnectionFactory;
use Pimple\Container;
use Pimple\ServiceProviderInterface;

class FactoryProvider implements ServiceProviderInterface {

	public function register(Container $pimple) {
		$pimple["factory.connection"] = function($pimple){
			$dbConnectionConfig = $pimple["config.general"]->doctrine->dbConnection;

			$connectionFactory = new ConnectionFactory(
				$dbConnectionConfig
			);

			return $connectionFactory;
		};
	}
}
