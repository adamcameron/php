<?php

namespace me\adamcameron\testApp\adapter;

use GuzzleHttp\Promise\Promise;
use GuzzleHttp\Psr7\Response;
use me\adamcameron\testApp\service\CachingService;

class CachingGuzzleAdapter implements Adapter {

    private $adapter;
    private $cache;

    public function __construct(Adapter $adapter, CachingService $cache) {
        $this->adapter = $adapter;
        $this->cache = $cache;
    }

    public function get($id) : Response {
        if ($this->cache->contains($id)) {
            return $this->returnResponseFromCache($id);
        }
        return $this->returnResponseFromWebService($id);
    }

    private function returnResponseFromCache($id) : Promise {
        $p = new Promise(function() use (&$p, $id){
            $cachedResult = $this->cache->get($id);

            $newResponse = new Response(
                $cachedResult['status'],
                $cachedResult['headers'],
                $cachedResult['body']
            );

            $p->resolve($newResponse);
        });

        return $p;
    }

    private function returnResponseFromWebService($id) : Promise {
        $response = $this->adapter->get($id);

        $response->then(function(Response $response) use ($id) {

            $detailsToCache = [
                'status' => $response->getStatusCode(),
                'headers' => $response->getHeaders(),
                'body' => $response->getBody()->getContents()
            ];
            $this->cache->put($id, $detailsToCache);
        });

        return $response;
    }
}
