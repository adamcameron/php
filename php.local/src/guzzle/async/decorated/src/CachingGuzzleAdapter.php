<?php

namespace me\adamcameron\testApp;

use GuzzleHttp\Promise\Promise;

class CachingGuzzleAdapter {

    private $adapter;
    private $cache;

    public function __construct($adapter, $cache) {
        $this->adapter = $adapter;
        $this->cache = $cache;
    }

    public function get($id){
        if ($this->cache->contains($id)) {

            $p = new Promise(function() use (&$p, $id){
                $cachedResult = $this->cache->get($id);
                $p->resolve($cachedResult);
            });

            return $p;
        }

        $response = $this->adapter->get($id);

        $response->then(function($response) use ($id) {
            $result = (string)$response->getBody();
            $this->cache->put($id, $result);
        });

        return $response;
    }
}
