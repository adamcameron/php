<?php

namespace me\adamcameron\decorator\service\cache;

class NullCacheService {

	public function isCached($key){
		return false;
	}

	public function put($key, $value){
	}

}