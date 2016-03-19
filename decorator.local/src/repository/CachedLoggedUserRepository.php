<?php

namespace me\adamcameron\decorator\repository;

use me\adamcameron\decorator\service\cache\CacheServiceInterface;
use me\adamcameron\decorator\service\logger\LoggerServiceInterface;

class CachedLoggedUserRepository implements RepositoryInterface {

	private $loggerService;
	private $cacheService;

	public function __construct(LoggerServiceInterface $loggerService, CacheServiceInterface $cacheService){
		$this->loggerService = $loggerService;
		$this->cacheService = $cacheService;
	}

	public function getById($id)
	{
		$this->loggerService->logText("$id requested");

		if ($this->cacheService->isCached($id)) {
			return $this->cacheService->get($id);
		}

		$user = [
			"id" => $id,
			"firstName" => "Number $id",
			"recordAccessed" => new \DateTime()
		];

		$this->cacheService->put($id, $user);
		return $user;
	}

}
