<?php

namespace doctrineTest\provider\service;

use Doctrine\ORM\Mapping\Driver\XmlDriver;
use Doctrine\ORM\Tools\Setup;
use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ConfigProvider implements ServiceProviderInterface {

	public function register(Container $pimple) {
		$pimple["config.general"] = function($pimple) {
			$config = $this->deserialiseConfig($pimple["configDir"]);

			return $config;
		};
		$pimple["config.doctrine"] = function($pimple) {
			$doctrineConfig = $this->setDoctrineConfig(
				$pimple["config.general"]->isDevMode,
				$pimple["config.general"]->doctrine
			);

			return $doctrineConfig;
		};
	}

	private function deserialiseConfig($configDir) {
		$configFile = $configDir . "/config.json";
		$configAsJson = file_get_contents($configFile);
		$configAsObject = json_decode($configAsJson);

		return $configAsObject;
	}

	private function setDoctrineConfig($isDevMode, $doctrineConfig){
		$fullSourcePath = realpath(__DIR__ . "/.." . $doctrineConfig->sourcePath);
		$fullMappingPath = realpath(__DIR__ . "/../../.." . $doctrineConfig->mappingPath);
		$config = Setup::createAnnotationMetadataConfiguration(
			[$fullSourcePath],
			$isDevMode
		);
		$driver = new XmlDriver([$fullMappingPath]);
		$config->setMetadataDriverImpl($driver);
		return $config;
	}
}
