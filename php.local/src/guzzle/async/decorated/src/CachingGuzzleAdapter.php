<?php

namespace me\adamcameron\testApp;

use GuzzleHttp\Promise\Promise;
use GuzzleHttp\Psr7\Response;

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
                echo "GETTING FROM CACHE" . PHP_EOL;
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

        $response = $this->adapter->get($id);

        $response->then(function(Response $response) use ($id) {
            echo "PUTTING IN CACHE" . PHP_EOL;

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
