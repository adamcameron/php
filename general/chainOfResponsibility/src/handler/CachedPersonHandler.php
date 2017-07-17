<?php

namespace me\adamcameron\cor\handler;

use me\adamcameron\cor\service\CacheService;

class CachedPersonHandler extends PersonRetrievalHandler {

    private $cacheService;

    public function __construct(CacheService $cacheService){
        parent::__construct();
        $this->cacheService = $cacheService;
    }

    public function perform($request, $response=null) {
        $id = $request;
        if ($this->cacheService->exists($id)) {
            $response = $this->cacheService->get($id);
        }

        return $this->nextHandler->perform($request, $response);
    }
}
