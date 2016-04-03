<?php

namespace me\adamcameron\decorator\repository;

use me\adamcameron\decorator\service\cache\CacheServiceInterface;
use me\adamcameron\decorator\service\logger\LoggerServiceInterface;

class CachedLoggedPersonRepository extends LoggedPersonRepository {

	protected $cacheService;

	public function __construct(LoggerServiceInterface $loggingService, CacheServiceInterface $cacheService) {
		parent::__construct($loggingService);
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
