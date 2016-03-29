<?php

namespace me\adamcameron\decorator\service\cache;

class BasicCacheService implements CacheServiceInterface {

	private $cache;

	public function __construct(){
		$this->cache = [];
	}

	public function isCached($id){
		echo "BasicCacheService used<br>";
		return array_key_exists($id, $this->cache);
	}

	public function get($id){
		return $this->cache[$id];
	}

	public function put($id, $value){
		$this->cache[$id] = $value;
	}

}
