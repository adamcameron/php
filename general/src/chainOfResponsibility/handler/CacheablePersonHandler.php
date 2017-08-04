<?php

namespace me\adamcameron\general\chainOfResponsibility\handler;

use me\adamcameron\general\chainOfResponsibility\service\CacheService;

class CacheablePersonHandler extends PersonRetrievalHandler {

    private $cacheService;

    public function __construct(CacheService $cacheService){
        parent::__construct();
        $this->cacheService = $cacheService;
    }

    public function perform($request, $response=null) {
        if (!is_null($response)) {
            $id = $request;
            if (!$this->cacheService->exists($id)) {
                $this->cacheService->put($id, $response);
            }
        }

        return $this->nextHandler->perform($request, $response);
    }
}
