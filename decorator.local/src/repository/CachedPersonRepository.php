<?php

namespace me\adamcameron\decorator\repository;

use me\adamcameron\decorator\service\cache\CacheServiceInterface;

class CachedPersonRepository extends PersonRepository {

	protected $cacheService;

	public function __construct(CacheServiceInterface $cacheService) {
		$this->cacheService = $cacheService;
	}

	public function getById($id) {
		if ($this->cacheService->isCached($id)) {
			return $this->cacheService->get($id);
		}
		$object = parent::getById($id);

		$this->cacheService->put($id, $object);
		return $object;
	}

}
