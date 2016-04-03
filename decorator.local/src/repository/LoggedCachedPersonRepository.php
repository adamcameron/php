<?php

namespace me\adamcameron\decorator\repository;

use me\adamcameron\decorator\service\cache\CacheServiceInterface;
use me\adamcameron\decorator\service\logger\LoggerServiceInterface;

class LoggedCachedPersonRepository extends CachedPersonRepository {

	protected $loggerService;

	public function __construct(CacheServiceInterface $cacheService, LoggerServiceInterface $loggerService) {
		parent::__construct($cacheService);
		$this->loggerService = $loggerService;
	}

	public function getById($id) {
		$this->loggerService->logText("$id requested");
		$object = parent::getById($id);

		return $object;
	}

}
