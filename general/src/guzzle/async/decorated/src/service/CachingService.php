<?php

namespace me\adamcameron\general\testApp\service;

class CachingService {

    public $loggingService;
    public $cache;

    public function __construct(LoggingService $loggingService) {
        $this->loggingService = $loggingService;
        $this->cache = [];
    }

    public function contains($id) {
        return array_key_exists($id, $this->cache);
    }

    public function get($id) {
        $this->loggingService->logMessage("CachingService: get called with $id");
        return $this->cache[$id];
    }

    public function put($id, $value) {
        $this->loggingService->logMessage("CachingService: put called with $id");

        $this->cache[$id] = $value;
    }
}
