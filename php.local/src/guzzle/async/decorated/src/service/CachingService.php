<?php

namespace me\adamcameron\testApp\service;

class CachingService {

    private $cache;

    public function __construct(){
        $this->cache = [];
    }

    public function contains($id){
        return array_key_exists($id, $this->cache);
    }

    public function get($id){
        return $this->cache[$id];
    }

    public function put($id, $value){
        return $this->cache[$id] = $value;
    }
}
