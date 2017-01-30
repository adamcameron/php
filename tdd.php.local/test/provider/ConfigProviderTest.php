<?php

namespace me\adamcameron\tdd\test\provider;

use me\adamcameron\tdd\provider\ConfigProvider;

/** @coversDefaultClass  \me\adamcameron\tdd\provider\ConfigProvider */
class ConfigProviderTest extends ProviderTest
{
    protected $sut = ConfigProvider::class;

    /**
     * @covers ::register
     * @covers ::getDeploymentEnvironment
     */
    public function testRegister()
    {
        putenv('deployment_environment=test');
        $this->provider->register($this->container);
        $this->assertArrayHasKey('TEST_CONFIG_VALUE', $this->container);
        $this->assertSame(true, $this->container['TEST_CONFIG_VALUE']);
    }

    public function testRegisterWithNoEnvSet()
    {
        putenv('deployment_environment=');
        $this->provider->register($this->container);
        $this->assertArrayNotHasKey('TEST_CONFIG_VALUE', $this->container);
        $this->assertArrayHasKey('debug', $this->container);
        $this->assertSame(false, $this->container['debug']);
    }
}
