<?php

namespace me\adamcameron\kahlan\provider;

use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Pimple\Container;
use Pimple\ServiceProviderInterface;

class LoggingProvider implements ServiceProviderInterface
{
    public function register(Container $container)
    {
        $logConfig = $container['service.config']->logging;

        $logPath = $this->resolveCanonicalPath($logConfig);

        $log = new Logger($logConfig->name);
        $log->pushHandler(new StreamHandler($logPath));

        $container['service.logger'] = $log;
    }

    private function resolveCanonicalPath($logConfig)
    {

        if (is_null($logConfig->path)) {
            return 'php://stdout';
        }

        $rawPath = __DIR__ . '/../..' . $logConfig->path;

        $dir = dirname($rawPath);
        $canonicalDir = realpath($dir);
        if (!$canonicalDir) {
            throw new \UnexpectedValueException("Invalid log path: $rawPath");
        }
        $file = basename($rawPath);
        $canonicalPath = $canonicalDir . '/' . $file;
        var_dump([
            'rawPath' => $rawPath,
            'dir' => $dir,
            'canonicalDir' => $canonicalDir,
            'file' => $file,
            'canonicalPath' => $canonicalPath
        ]);
        return $canonicalPath;
    }
}
