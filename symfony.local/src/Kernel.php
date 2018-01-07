<?php

namespace dac\s4;

use Symfony\Bundle\FrameworkBundle\Kernel\MicroKernelTrait;
use Symfony\Component\Config\Loader\LoaderInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Kernel as BaseKernel;
use Symfony\Component\Routing\RouteCollectionBuilder;

class Kernel extends BaseKernel
{
    use MicroKernelTrait;

    private $projectDir;
    private $configDir;

    public function __construct(string $environment, bool $debug)
    {
        parent::__construct($environment, $debug);

        $this->projectDir = $this->getProjectDir();
        $this->configDir = $this->projectDir . '/config';
    }

    public function getCacheDir()
    {
        return $this->projectDir . '/var/cache/' . $this->environment;
    }

    public function getLogDir()
    {
        return $this->projectDir . '/var/log';
    }

    public function registerBundles()
    {
        $contents = require $this->configDir . '/bundles.php';
        foreach ($contents as $class => $envs) {
            if (isset($envs['all']) || isset($envs[$this->environment])) {
                yield new $class();
            }
        }
    }

    protected function configureContainer(ContainerBuilder $container, LoaderInterface $loader)
    {
        $container->setParameter('container.autowiring.strict_mode', true);
        $container->setParameter('container.dumper.inline_class_loader', true);
        $loader->load($this->configDir . '/packages/*.{yaml}', 'glob');
        if (is_dir($this->configDir . '/packages/' . $this->environment)) {
            $loader->load($this->configDir . '/packages/' . $this->environment.'/**/*.{yaml}', 'glob');
        }
        $loader->load($this->configDir . '/services.{yaml}', 'glob');
    }

    protected function configureRoutes(RouteCollectionBuilder $routes)
    {
        $routes->import($this->configDir . '/routes.yaml', '/', 'glob');
    }
}
