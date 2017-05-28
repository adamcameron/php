<?php

namespace me\adamcameron\silex2\test\provider;

use me\adamcameron\silex2\provider\ConfigProvider;
use PHPUnit\Framework\TestCase;
use Pimple\Container;

/** @coversDefaultClass  \me\adamcameron\silex2\provider\ConfigProvider */
class ConfigProviderTest extends TestCase
{
	private $provider;
	private $container;

	public function setup()
	{
		$this->container = new Container();
		$this->provider = new ConfigProvider();
	}

	/** @covers ::register */
	public function testRegister()
	{
		$this->provider->register($this->container);
		$this->assertArrayHasKey('TEST_CONFIG_VALUE', $this->container);
		$this->assertSame(true, $this->container['TEST_CONFIG_VALUE']);
	}

	/** @covers ::register */
	public function testRegisterWithNoEnvSet()
	{
		putenv('deployment_environment=');
		$this->provider->register($this->container);
		$this->assertArrayNotHasKey('TEST_CONFIG_VALUE', $this->container);
		$this->assertArrayHasKey('debug', $this->container);
		$this->assertSame(false, $this->container['debug']);
	}
}
