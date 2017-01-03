<?php

namespace me\adamcameron\cor\handler;

use me\adamcameron\cor\service\CacheService;

class CacheablePersonHandler extends PersonRetrievalHandler {

    private $cacheService;

    public function __construct(CacheService $cacheService){
        parent::__construct();
        $this->cacheService = $cacheService;
    }

    public function perform($request, $response=null) {
        if (!is_null($response)) {
            $id = $request;
            $this->cacheService->put($id, $response);
        }

        return $this->nextHandler->perform($request, $response);
    }
}
