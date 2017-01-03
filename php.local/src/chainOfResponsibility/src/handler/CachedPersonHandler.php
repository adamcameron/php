<?php

namespace me\adamcameron\cor\handler;

use me\adamcameron\cor\service\CacheService;

class CachedPersonHandler extends PersonRetrievalHandler {

    private $cacheService;

    public function __construct(CacheService $cacheService){
        parent::__construct();
        $this->cacheService = $cacheService;
    }

    public function getById(int $id) {
        if ($this->cacheService->exists($id)) {
            return $cachedPerson = $this->cacheService->get($id);
        }

        return $this->nextHandler->getById($id);
    }
}
