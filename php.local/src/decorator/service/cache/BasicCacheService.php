<?php

namespace me\adamcameron\decorator\service\cache;

class BasicCacheService {

	private $cache;

	public function __construct(){
		$this->cache = [];
	}

	public function isCached($key){
		return array_key_exists($key);
	}

	public function get($key){
		return $this->cache[$key];
	}

	public function put($key, $value){
		$this->cache[$key] = $value;
	}
}