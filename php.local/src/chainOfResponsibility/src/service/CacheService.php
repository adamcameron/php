<?php

namespace me\adamcameron\cor\service;

class CacheService {

    private $cache = [];
    private $logger;

    public function __construct(LoggingService $logger)
    {
        $this->logger = $logger;
    }

    public function get($key) {
        $this->logger->info("Cache hit for $key");
        return $this->cache[$key];
    }

    public function exists(string $key) : bool {
        $exists = array_key_exists($key, $this->cache);

        $this->logger->info(sprintf("Cache %s for %d", $exists ? 'hit' : 'miss', $key));

        return $exists;
    }

    public function put(string $key, $value) {
        $this->cache[$key] = $value;
    }
}
