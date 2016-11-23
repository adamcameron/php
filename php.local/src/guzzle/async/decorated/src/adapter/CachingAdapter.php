<?php

namespace me\adamcameron\testApp\adapter;

use GuzzleHttp\Promise\Promise;
use GuzzleHttp\Psr7\Response;
use me\adamcameron\testApp\service\CachingService;

class CachingAdapter implements Adapter {

    private $adapter;
    private $cache;

    public function __construct(Adapter $adapter, CachingService $cache) {
        $this->adapter = $adapter;
        $this->cache = $cache;
    }

    public function get($url, $parameters) : Promise {
        $cacheKey = $this->getCacheKeyForParameters($parameters);
        if ($this->cache->contains($cacheKey)) {
            return $this->returnResponseFromCache($cacheKey);
        }
        return $this->returnResponseFromWebService($url, $parameters, $cacheKey);
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

    private function returnResponseFromWebService($url, $parameters, $cacheKey) : Promise {
        $response = $this->adapter->get($url, $parameters);

        $response->then(function(Response $response) use ($cacheKey) {

            $detailsToCache = [
                'status' => $response->getStatusCode(),
                'headers' => $response->getHeaders(),
                'body' => $response->getBody()->getContents()
            ];

            $this->cache->put($cacheKey, $detailsToCache);
        });

        return $response;
    }

    private function getCacheKeyForParameters($parameters) {
        return md5(json_encode($parameters));
    }
}
