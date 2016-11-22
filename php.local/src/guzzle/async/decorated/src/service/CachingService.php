<?php

namespace me\adamcameron\testApp\service;

class CachingService {

    public $cache;

    public function __construct(){
        $this->cache = [];
    }

    public function contains($id){
        return array_key_exists($id, $this->cache);
    }

    public function get($id){
        echo "Getting $id from cache" . PHP_EOL . PHP_EOL;
        return $this->cache[$id];
    }

    public function put($id, $value){
        echo "Putting $id into cache" . PHP_EOL . PHP_EOL;
        return $this->cache[$id] = $value;
    }
}
