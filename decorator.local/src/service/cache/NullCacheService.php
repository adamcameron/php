<?php

namespace me\adamcameron\decorator\service\cache;

class NullCacheService implements CacheServiceInterface{

	public function __construct(){
	}

	public function isCached($id){
		echo "NullCacheService used<br>";
		return false;
	}

	public function get($id){
		throw new \Exception("TBC");
	}

	public function put($id, $value){

	}

}
