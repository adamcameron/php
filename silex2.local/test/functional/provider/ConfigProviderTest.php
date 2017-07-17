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
        putenv('deployment_environment=test');
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

    public function testDbConfig()
    {
        putenv('deployment_environment=dev');
        $this->provider->register($this->container);
        $this->assertArrayHasKey('db', $this->container);

        $expected = [
            'host' => 'localhost',
            'port' => '3306',
            'database' => 'scratch',
            'login' => 'scratch',
            'password' => 'scratch'
        ];
        $this->assertEquals($expected, $this->container['db']);
    }
}
