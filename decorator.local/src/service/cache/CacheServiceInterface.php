<?php

namespace me\adamcameron\decorator\service\cache;

interface CacheServiceInterface {

	public function isCached($id);

	public function get($id);

	public function put($id, $value);

}
